<?php

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
    public function show(string $bookSlug, string $chapterSlug)
    {
        $chapter = $this->chapterRepo->getBySlug($bookSlug, $chapterSlug);
        $this->checkOwnablePermission('chapter-view', $chapter);

        $sidebarTree = (new BookContents($chapter->book))->getTree();
        $pages = $chapter->getVisiblePages();
        $nextPreviousLocator = new NextPreviousContentLocator($chapter, $sidebarTree);
        View::incrementFor($chapter);

        $this->setPageTitle($chapter->getShortName());

        return view('categories.show', [
            'book'           => $chapter->book,
            'chapter'        => $chapter,
            'current'        => $chapter,
            'sidebarTree'    => $sidebarTree,
            'watchOptions'   => new UserEntityWatchOptions(user(), $chapter),
            'pages'          => $pages,
            'next'           => $nextPreviousLocator->getNext(),
            'previous'       => $nextPreviousLocator->getPrevious(),
            'referenceCount' => $this->referenceFetcher->getReferenceCountToEntity($chapter),
        ]);
    }

    /**
     * Show the form for editing the specified Category.
     */
    public function edit(string $bookSlug, string $chapterSlug)
    {
        $chapter = $this->chapterRepo->getBySlug($bookSlug, $chapterSlug);
        $this->checkOwnablePermission('chapter-update', $chapter);

        $this->setPageTitle(trans('entities.chapters_edit_named', ['chapterName' => $chapter->getShortName()]));

        return view('chapters.edit', ['book' => $chapter->book, 'chapter' => $chapter, 'current' => $chapter]);
    }

    /**
     * Update the specified Category in storage.
     *
     * @throws NotFoundException
     */
    public function update(Request $request, string $bookSlug, string $chapterSlug)
    {
        $validated = $this->validate($request, [
            'name'             => ['required', 'string', 'max:255'],
            'description_html' => ['string', 'max:2000'],
            'tags'             => ['array'],
        ]);

        $chapter = $this->chapterRepo->getBySlug($bookSlug, $chapterSlug);
        $this->checkOwnablePermission('chapter-update', $chapter);

        $this->chapterRepo->update($chapter, $validated);

        return redirect($chapter->getUrl());
    }

    /**
     * Shows the page to confirm deletion of this Category.
     *
     * @throws NotFoundException
     */
    public function showDelete(string $bookSlug, string $chapterSlug)
    {
        $chapter = $this->chapterRepo->getBySlug($bookSlug, $chapterSlug);
        $this->checkOwnablePermission('chapter-delete', $chapter);

        $this->setPageTitle(trans('entities.chapters_delete_named', ['chapterName' => $chapter->getShortName()]));

        return view('chapters.delete', ['book' => $chapter->book, 'chapter' => $chapter, 'current' => $chapter]);
    }

    /**
     * Remove the specified Category from storage.
     *
     * @throws NotFoundException
     * @throws Throwable
     */
    public function destroy(string $bookSlug, string $chapterSlug)
    {
        $chapter = $this->chapterRepo->getBySlug($bookSlug, $chapterSlug);
        $this->checkOwnablePermission('chapter-delete', $chapter);

        $this->chapterRepo->destroy($chapter);

        return redirect($chapter->book->getUrl());
    }

    /**
     * Show the page for moving a Category.
     *
     * @throws NotFoundException
     */
    public function showMove(string $bookSlug, string $chapterSlug)
    {
        $chapter = $this->chapterRepo->getBySlug($bookSlug, $chapterSlug);
        $this->setPageTitle(trans('entities.chapters_move_named', ['chapterName' => $chapter->getShortName()]));
        $this->checkOwnablePermission('chapter-update', $chapter);
        $this->checkOwnablePermission('chapter-delete', $chapter);

        return view('chapters.move', [
            'chapter' => $chapter,
            'book'    => $chapter->book,
        ]);
    }

    /**
     * Perform the move action for a Category.
     *
     * @throws NotFoundException|NotifyException
     */
    public function move(Request $request, string $bookSlug, string $chapterSlug)
    {
        $chapter = $this->chapterRepo->getBySlug($bookSlug, $chapterSlug);
        $this->checkOwnablePermission('chapter-update', $chapter);
        $this->checkOwnablePermission('chapter-delete', $chapter);

        $entitySelection = $request->get('entity_selection', null);
        if ($entitySelection === null || $entitySelection === '') {
            return redirect($chapter->getUrl());
        }

        try {
            $this->chapterRepo->move($chapter, $entitySelection);
        } catch (PermissionsException $exception) {
            $this->showPermissionError();
        } catch (MoveOperationException $exception) {
            $this->showErrorNotification(trans('errors.selected_book_not_found'));

            return redirect($chapter->getUrl('/move'));
        }

        return redirect($chapter->getUrl());
    }

    /**
     * Show the view to copy a Category.
     *
     * @throws NotFoundException
     */
    public function showCopy(string $bookSlug, string $chapterSlug)
    {
        $chapter = $this->chapterRepo->getBySlug($bookSlug, $chapterSlug);
        $this->checkOwnablePermission('chapter-view', $chapter);

        session()->flashInput(['name' => $chapter->name]);

        return view('chapters.copy', [
            'book'    => $chapter->book,
            'chapter' => $chapter,
        ]);
    }

    /**
     * Create a copy of a Category within the requested target destination that is another Category.
     *
     * @throws NotFoundException
     * @throws Throwable
     */
    public function copy(Request $request, Cloner $cloner, string $bookSlug, string $chapterSlug)
    {
        $chapter = $this->chapterRepo->getBySlug($bookSlug, $chapterSlug);
        $this->checkOwnablePermission('chapter-view', $chapter);

        $entitySelection = $request->get('entity_selection') ?: null;
        $newParentBook = $entitySelection ? $this->chapterRepo->findParentByIdentifier($entitySelection) : $chapter->getParent();

        if (is_null($newParentBook)) {
            $this->showErrorNotification(trans('errors.selected_book_not_found'));

            return redirect($chapter->getUrl('/copy'));
        }

        $this->checkOwnablePermission('chapter-create', $newParentBook);

        $newName = $request->get('name') ?: $chapter->name;
        $chapterCopy = $cloner->cloneChapter($chapter, $newParentBook, $newName);
        $this->showSuccessNotification(trans('entities.chapters_copy_success'));

        return redirect($chapterCopy->getUrl());
    }
    
}
