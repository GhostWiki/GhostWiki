<?php

namespace BookStack\Entities\Tools;

use App\Entities\Models\Category;
use App\Entities\Models\Shelf;
use Illuminate\Support\Facades\Session;

class CategoryContext
{
    protected $key = 'context_shelf_id';

    /**
     * Get the current shelf context for the given category
     */
    public function getContextualShelfForCategory(Category $category): ?Shelf
    {
        $shelfId = Session::get($this->key);

        if (!$shelfId) {
            return null;
        }

        return Shelf::find($shelfId)->containsCategory($category);
    }

    /**
     * Store the current contextual shelf ID
     */
    public function setShelfContext(int $shelfId)
    {
        Session::put($this->key, $shelfId);
    }

    /**
     * Clear the session stored shelf context ID
     */
    public function clearShelfContext()
    {
        Session::forget($this->key);
    }
}