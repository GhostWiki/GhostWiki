<?php

// Updated to reflect the new database structure: nested categories for pages
// Pending further updates for comments...

namespace BookStack\Entities\Models;

use BookStack\References\ReferenceUpdater;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class CategoryChild
 * 
 * @property int    $category_id
 * @property int    $priority
 * @property string $category_slug
 * @property Category   $category
 * 
 * @method Builder whereSlugs(string $categorySlug, string $childSlug)
 */
abstract class CategoryChild extends Entity
{
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('category_slug', function (Builder $builder) {
            $builder->addSelect([
                'category_slug' => function ($builder) {
                    $builder->select('slug')
                        ->from('categories')
                        ->whereColumn('categories.id', '=', 'category_id');
                }
            ]); 
        });
    }

    // Add baseQuery scope
    public function scopeBaseQuery($query)
    {
    return $query;
    }


    /**
     * Scope query to find by category slug and child slug
     */
    public function scopeWhereSlugs(Builder $query, string $categorySlug, string $childSlug)
    {
        return $query->with('category')
            ->whereHas('category', function($query) use ($categorySlug) {
                $query->where('slug', '=', $categorySlug); 
            })
            ->where('slug', '=', $childSlug);
    }

    /**
     * Get the category this child belongs to
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class)->withTrashed();
    }

    /**
     * Change the category that this entity belongs to.
     */ 
    public function changeCategory(int $newCategoryId): Entity
    {
        $oldUrl = $this->getUrl();
        $this->category_id = $newCategoryId;
        $this->refreshSlug();
        $this->save();
        $this->refresh();

        if ($oldUrl !== $this->getUrl()) {
            app()->make(ReferenceUpdater::class)->updateEntityReferences($this, $oldUrl);
        }

        // Update all child pages to this new category
        if ($this instanceof Category) {
            foreach ($this->pages()->withTrashed()->get() as $page) {
                $page->changeCategory($newCategoryId); 
            }
        }

        return $this;
    }
}
