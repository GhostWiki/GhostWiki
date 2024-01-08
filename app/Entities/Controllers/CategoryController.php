<?php

// Updated to reflect the new database structure: nested categories for pages
// Pending further updates for comments... 

namespace BookStack\Entities\Controllers;

use BookStack\Activity\Models\View;
use BookStack\Activity\Tools\UserEntityWatchOptions;
//use BookStack\Entities\Models\Book;
use BookStack\Entities\Repos\CategoryRepo;
use BookStack\Entities\Tools\CategoryContents;
use BookStack\Entities\Tools\Cloner;
use BookStack\Entities\Tools\HierarchyTransformer;
use BookStack\Entities\Tools\NextPreviousContentLocator;
use BookStack\Exceptions\MoveOperationException;
use BookStack\Exceptions\NotFoundException;
use BookStack\Exceptions\NotifyException;
use BookStack\Exceptions\PermissionsException;
use BookStack\Http\Controller;
use BookStack\References\ReferenceFetcher;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Throwable;

class CategoryController extends Controller
{
    public function __construct(
        protected CategoryRepo $categoryRepo,
        protected ReferenceFetcher $referenceFetcher
    ) {
    }

    /**
     * Show the form for creating a new Category
     */
    public function create(string $categorySlug)
    {
        $category = Category::visible()->where('slug', '=', $categorySlug)->firstOrFail();
        $this->checkOwnablePermission('category-create', $category);

        $this->setPageTitle(trans('entities.category_create'));

        return view('category.create', ['category' => $category, 'current' => $category]);
    }

    /**
     * Store a newly created Category in storage.
     *
     * @throws ValidationException
     */
    public function store(Request $request, $categorySlug)
    {
        $validated = $this->validate($request, [
            'name'             => ['required', 'string', 'max:255'],
            'description_html' => ['string', 'max:2000'],
            'tags'             => ['array'],
        ]);

        $category = Category::visible()->where('slug', '=', $categorySlug)->firstOrFail();
        $this->checkOwnablePermission('category-create', $category);

        $category = $this->categoryRepo->create($validated, $category);

        return redirect($category->getUrl());
    }

    /**
     * Display the specified Category.
     */
    public function show( string $categorySlug)
    {
        $category = $this->categoryRepo->getBySlug($categorySlug);
        $this->checkOwnablePermission('chapter-view', $chapter);

        $sidebarTree = (new CategoryContents($category))->getTree();
        $pages = $category->getVisiblePages();
        $nextPreviousLocator = new NextPreviousContentLocator($category, $sidebarTree);
        View::incrementFor($category);

        $this->setPageTitle($category->getShortName());

        return view('categories.show', [
            'category'       => $category,
            'current'        => $category,
            'sidebarTree'    => $sidebarTree,
            'watchOptions'   => new UserEntityWatchOptions(user(), $category),
            'pages'          => $pages,
            'next'           => $nextPreviousLocator->getNext(),
            'previous'       => $nextPreviousLocator->getPrevious(),
            'referenceCount' => $this->referenceFetcher->getReferenceCountToEntity($category),
        ]);
    }

    /**
     * Show the form for editing the specified Category.
     */
    public function edit(string $categorySlug)
    {
        $category = $this->categoryRepo->getBySlug($categorySlug);
        $this->checkOwnablePermission('category-update', $category);

        $this->setPageTitle(trans('entities.categories_edit_named', ['categoryName' => $category->getShortName()]));

        return view('categories.edit', ['category' => $category, 'current' => $category]);
    }

    /**
     * Update the specified Category in storage.
     *
     * @throws NotFoundException
     */
    public function update(Request $request, string $categorySlug)
    {
        $validated = $this->validate($request, [
            'name'             => ['required', 'string', 'max:255'],
            'description_html' => ['string', 'max:2000'],
            'tags'             => ['array'],
        ]);

        $category = $this->categoryRepo->getBySlug($categorySlug);
        $this->checkOwnablePermission('category-update', $category);

        $this->categoryRepo->update($category, $validated);

        return redirect($category->getUrl());
    }

    /**
     * Shows the page to confirm deletion of this Category.
     *
     * @throws NotFoundException
     */
    public function showDelete(string $categorySlug)
    {
        $category = $this->categoryRepo->getBySlug($categorySlug);
        $this->checkOwnablePermission('category-delete', $category);

        $this->setPageTitle(trans('entities.category_delete_named', ['categoryName' => $category->getShortName()]));

        return view('category.delete', ['category' => $category, 'current' => $category]);
    }

    /**
     * Remove the specified Category from storage.
     *
     * @throws NotFoundException
     * @throws Throwable
     */
    public function destroy(string $categorySlug)
    {
        $category = $this->categoryRepo->getBySlug($categorySlug);
        $this->checkOwnablePermission('category-delete', $category);

        $this->categoryRepo->destroy($category);

        return redirect($category->getUrl());
    }

    /**
     * Show the page for moving a Category.
     *
     * @throws NotFoundException
     */
    public function showMove(string $categorySlug)
    {
        $category = $this->categoryRepo->getBySlug($categorySlug);
        $this->setPageTitle(trans('entities.category_move_named', ['categoryName' => $category->getShortName()]));
        $this->checkOwnablePermission('category-update', $category);
        $this->checkOwnablePermission('category-delete', $category);

        return view('category.move', [
            'category' => $category,
        ]);
    }

    /**
     * Perform the move action for a Category.
     *
     * @throws NotFoundException|NotifyException
     */
    public function move(Request $request, string $categorySlug)
    {
        $category = $this->categoryRepo->getBySlug($categorySlug);
        $this->checkOwnablePermission('category-update', $category);
        $this->checkOwnablePermission('category-delete', $category);

        $entitySelection = $request->get('entity_selection', null);
        if ($entitySelection === null || $entitySelection === '') {
            return redirect($category->getUrl());
        }

        try {
            $this->categoryRepo->move($category, $entitySelection);
        } catch (PermissionsException $exception) {
            $this->showPermissionError();
        } catch (MoveOperationException $exception) {
            $this->showErrorNotification(trans('errors.selected_category_not_found'));

            return redirect($category->getUrl('/move'));
        }

        return redirect($category->getUrl());
    }

    /**
     * Show the view to copy a Category.
     *
     * @throws NotFoundException
     */
    public function showCopy(string $categorySlug)
    {
        $category = $this->categoryRepo->getBySlug($categorySlug);
        $this->checkOwnablePermission('category-view', $category);

        session()->flashInput(['name' => $category->name]);

        return view('category.copy', [
            'category' => $category,
        ]);
    }

    /**
     * Create a copy of a Category within the requested target destination that is another Category.
     *
     * @throws NotFoundException
     * @throws Throwable
     */
    public function copy(Request $request, Cloner $cloner, string $categorySlug)
    {
        $category = $this->categoryRepo->getBySlug($categorySlug);
        $this->checkOwnablePermission('category-view', $category);

        $entitySelection = $request->get('entity_selection') ?: null;
        $newParentCategory = $entitySelection ? $this->categoryRepo->findParentByIdentifier($entitySelection) : $category->getParent();

        if (is_null($newParentCategory)) {
            $this->showErrorNotification(trans('errors.selected_category_not_found'));

            return redirect($category->getUrl('/copy'));
        }

        $this->checkOwnablePermission('category-create', $newParentCategory);

        $newName = $request->get('name') ?: $category->name;
        $categoryCopy = $cloner->cloneChapter($category, $newParentCategory, $newName);
        $this->showSuccessNotification(trans('entities.category_copy_success'));

        return redirect($categoryCopy->getUrl());
    }
    
}
