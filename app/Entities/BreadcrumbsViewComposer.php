<?php

// Updated to reflect the new database structure: nested categories for pages
// Pending further updates for comments... 

namespace BookStack\Entities;

use App\Entities\Models\Category;
use App\Entities\Tools\CategoryContext;
use Illuminate\View\View;

class BreadcrumbsViewComposer
{
    public function __construct(
        protected CategoryContext $categoryContext
    ) {
    }

    /**
     * Modify data when the view is composed.
     */
    public function compose(View $view): void
    {
        $crumbs = $view->getData()['crumbs'];
        $firstCrumb = $crumbs[0] ?? null;

        if ($firstCrumb instanceof Category) {
            $shelf = $this->categoryContext->getContextualShelfForCategory($firstCrumb);
            if ($shelf) {
                array_unshift($crumbs, $shelf);
                $view->with('crumbs', $crumbs);
            }
        }
    }
}
