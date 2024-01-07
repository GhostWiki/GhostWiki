<?php

namespace BookStack\Entities\Repos;

use BookStack\Activity\ActivityType;
//use BookStack\Entities\Models\Book;
use BookStack\Entities\Models\Category;
use BookStack\Entities\Models\Entity;
use BookStack\Entities\Tools\BookContents;
use BookStack\Entities\Tools\TrashCan;
use BookStack\Exceptions\MoveOperationException;
use BookStack\Exceptions\NotFoundException;
use BookStack\Exceptions\PermissionsException;
use BookStack\Facades\Activity;
use Exception;

class CategoryRepo
{
    public function __construct(
        protected BaseRepo $baseRepo
    ) {
    }

    /**
     * Get a category via the slug.
     *
     * @throws NotFoundException
     */
    public function getBySlug(string $categorySlug): Category
    {
        $category = Category::visible()->whereSlug($categorySlug)->first();

        if ($category === null) {
            throw new NotFoundException(trans('errors.category_not_found'));
        }

        return $category;
    }

    /**
     * Create a new category in the system.
     */
    public function create(array $input): Category
    {
        $category = new Category();
        $category->priority = (new CategoryContents())->getLastPriority() + 1;
        $this->baseRepo->create($category, $input);
        Activity::add(ActivityType::CATEGORY_CREATE, $category);

        return $category;
    }

    /**
     * Update the given category.
     */
    public function update(Category $category, array $input): Category
    {
        $this->baseRepo->update($category, $input);
        Activity::add(ActivityType::CATEGORY_UPDATE, $category);

        return $category;
    }


    /**
     * Remove a chapter from the system.
     *
     * @throws Exception
     */
    public function destroy(Category $category)
    {
        $trashCan = new TrashCan();
        $trashCan->softDestroyChapter($category);
        Activity::add(ActivityType::CATEGORY_DELETE, $category);
    //  $this->baseRepo->destroy($category);
        $trashCan->autoClearOld();
    }

    /**
     * Move the given chapter into a new parent book.
     * The $parentIdentifier must be a string of the following format:
     * 'book:<id>' (book:5).
     *
     * @throws MoveOperationException
     * @throws PermissionsException
     */

    //public function move(Category $category, string $parentIdentifier): Category
    public function move(Category $category, Category $target)
    {
        if (!$category->canBeMovedTo($target)) {
            throw new MoveOperationException(trans('errors.cannot_move_category_to_self'));
        }

        if (!$target->canContain($category)) {
            throw new PermissionsException(trans('errors.cannot_move_category_to_parent'));
        }

    //  $category->moveTo($target);
        $category->changeCategory($parent->id);
        $category->rebuildPermissions();
        Activity::add(ActivityType::CATEGORY_MOVE, $category);

        return $parent;
    }

    /**
     * Find a page parent entity via an identifier string in the format:
     * {type}:{id}
     * Example: (book:5).
     *
     * @throws MoveOperationException
     */
    public function findParentByIdentifier(string $identifier): ?Book
    {
        $stringExploded = explode(':', $identifier);
        $entityType = $stringExploded[0];
        $entityId = intval($stringExploded[1]);

        if ($entityType !== 'book') {
            throw new MoveOperationException('Chapters can only be in books');
        }

        return Book::visible()->where('id', '=', $entityId)->first();
    }
}
