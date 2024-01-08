<?php

// Updated to reflect the new database structure: nested categories for pages
// Pending further updates for comments... 

namespace BookStack\Entities\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Category.
 *
 * @property Collection<Page> $pages
 * @property string           $description
 */
class Category extends Model
{
    use HasFactory;
    use HasHtmlDescription;

    public float $searchFactor = 1.2;

    protected $fillable = ['name', 'description', 'priority', 'parent_id'];
    protected $hidden = ['pivot', 'deleted_at', 'description_html'];

    /**
     * Get the Page that is used as default template for newly created pages within this Category.
     */
    public function defaultTemplate(): BelongsTo
    {
        return $this->belongsTo(Page::class, 'default_template_id');
    }

    /**
     * Get the parent category of this category
     */
    public function parent() {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    /**
     * Get all child categories of this category
     */ 
    public function children() {
        return $this->hasMany(Category::class, 'parent_id');
    }


    /**
     * Get the pages that this Category contains.
     *
     * @return HasMany<Page>
     */
    public function pages(string $dir = 'ASC'): HasMany
    {
        return $this->hasMany(Page::class)->orderBy('priority', $dir);
    }

    /**
     * Get the url of this Category.
     */
    public function getUrl(string $path = ''): string
    {
        $parts = [
            'category',
            urlencode($this->slug),
            trim($path, '/'),
        ];

        return url('/' . implode('/', $parts));
    }

    /**
     * Get the visible pages in this Category.
     */
    public function getVisiblePages(): Collection
    {
        return $this->pages()
        ->scopes('visible')
        ->orderBy('draft', 'desc')
        ->orderBy('priority', 'asc')
        ->get();
    }

    /**
     * Get a visible chapter by its book and page slugs.
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public static function getBySlugs(string $categorySlug): Page
    {
      return Page::visible()
        ->whereHas('category', function(Builder $query) use ($categorySlug) {
          $query->where('slug', $categorySlug); 
        })
        ->firstOrFail();
    }
}
