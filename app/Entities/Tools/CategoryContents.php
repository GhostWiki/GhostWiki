<?php

// Updated to reflect the new database structure: nested categories for pages
// Pending further updates for comments... 

namespace BookStack\Entities\Tools;

//use BookStack\Entities\Models\Book;
use BookStack\Entities\Models\CategoryChild;
use BookStack\Entities\Models\Category;
use BookStack\Entities\Models\Entity;
use BookStack\Entities\Models\Page;
use Illuminate\Support\Collection;

class CategoryContents
{
    protected Category $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    /**
     * Get the current priority of the last item at the top-level of the book.
     */
    public function getLastPriority(): int
    {
        $maxPage = Page::visible()->where('category_id', '=', $this->category->id)
            ->where('draft', '=', false)
            ->where('category_id', '=', 0)->max('priority');
        $maxChapter = Category::visible()->where('category_id', '=', $this->category->id)
            ->max('priority');

        return max($maxChapter, $maxPage, 1);
    }

    /**
     * Sort the category's content using the given sort function.
     */
    protected function categoryChildSortFunc(): callable
    {
        return function (CategoryChild $entity) {
            if (isset($entity['draft']) && $entity['draft']) {
                return -100;
            }

            return $entity['priority'] ?? 0;
        };
    }

    /**
     * Get the contents as a sorted collection tree.
     */
    public function getTree(bool $showDrafts = false, bool $renderPages = false): Collection
    {
        $pages = $this->getPages($showDrafts, $renderPages);

        $categories = Category::visible()->where('parent_id', '=', $this->category->id)->get();
        $all = collect()->concat($pages)->concat($categories);
        $categoryMap = $categories->keyBy('id');
        $lonePages = collect();

        $pages->groupBy('category_id')->each(function ($pages, $category_id) use ($categoryMap, &$lonePages) {
            $category = $categoryMap->get($category_id);
            if ($category) {
                $category->setAttribute('visible_pages', collect($pages)->sortBy($this->categoryChildSortFunc()));
            } else {
                $lonePages = $lonePages->concat($pages);
            }
        });

        $categories->whereNull('visible_pages')->each(function (Category $category) {
            $category->setAttribute('visible_pages', collect([]));
        });

        $all->each(function (CategoryChild $entity) use ($renderPages) {
            $entity->setRelation('category', $this->category);

            if ($renderPages && $entity instanceof Page) {
                $entity->html = (new PageContent($entity))->render();
            }
        });

        return collect($categories)->concat($lonePages)->sortBy($this->categoryChildSortFunc());
    }



    /**
     * Get the visible pages within this category.
     */
    protected function getPages(bool $showDrafts = false, bool $getPageContent = false): Collection
    {
        $query = Page::visible()
            ->select($getPageContent ? Page::$contentAttributes : Page::$listAttributes)
            ->where('category_id', '=', $this->category->id);

        if (!$showDrafts) {
            $query->where('draft', '=', false);
        }

        return $query->get();
    }

  
}
