<?php

// Updated to reflect the new database structure: nested categories for pages
// Pending further updates for comments... 

namespace BookStack\Entities\Tools;

use BookStack\Activity\Models\Tag;
//use BookStack\Entities\Models\Book;
//use BookStack\Entities\Models\Bookshelf;
use BookStack\Entities\Models\Category;
use BookStack\Entities\Models\Entity;
use BookStack\Entities\Models\HasCoverImage;
use BookStack\Entities\Models\Page;
//use BookStack\Entities\Repos\BookRepo;
use BookStack\Entities\Repos\CategoryRepo;
use BookStack\Entities\Repos\PageRepo;
use BookStack\Uploads\Image;
use BookStack\Uploads\ImageService;
use Illuminate\Http\UploadedFile;

class Cloner
{
    protected PageRepo $pageRepo;
    protected CategoryRepo $categoryRepo;
    //protected BookRepo $bookRepo;
    protected ImageService $imageService;

    public function __construct(PageRepo $pageRepo, CategoryRepo $categoryRepo, ImageService $imageService)
    {
        $this->pageRepo = $pageRepo;
        $this->categoryRepo = $categoryRepo;
        //$this->bookRepo = $bookRepo;
        $this->imageService = $imageService;
    }

    /**
     * Clone the given page into the given parent using the provided name.
     */
    public function clonePage(Page $original, Entity $parent, string $newName): Page
    {
        $copyPage = $this->pageRepo->getNewDraftPage($parent);
        $pageData = $this->entityToInputData($original);
        $pageData['name'] = $newName;

        return $this->pageRepo->publishDraft($copyPage, $pageData);
    }

    /**
     * Clone the given page into the given parent using the provided name.
     * Clones all child pages.
     */
    /* public function cloneCategory(Category $original, Category $parent, string $newName): Category
    {
        $categoryDetails = $this->entityToInputData($original);
        $categoryDetails['name'] = $newName;

        $copyCategory = $this->categoryRepo->create($categoryDetails, $parent);

        if (userCan('page-create', $copyCategory)) {
            /** @var Page $page */
            /* foreach ($original->getVisiblePages() as $page) {
                $this->clonePage($page, $copyCategory, $page->name);
            }
        }

        return $copyCategory;
    } */



    
    /**
     * Clone the given category.
     * Clones all child categories & pages.
     */
    public function cloneCategory(Category $original, string $newName): Category
    {
        $categoryDetails = $this->entityToInputData($original);
        $categoryDetails['name'] = $newName;

        // Clone category
        $copyCategory = $this->categoryRepo->create($categoryDetails);

        // Clone contents
        $directChildren = $original->getDirectChildren();
        foreach ($directChildren as $child) {
            if ($child instanceof Category && userCan('category-create', $copyBook)) {
                $this->cloneCategory($child, $copyCategory, $child->name);
            }

            if ($child instanceof Page && !$child->draft && userCan('page-create', $copyBook)) {
                $this->clonePage($child, $copyCategory, $child->name);
            }
        }

        // Clone category relationships
        /** @var Bookshelf $shelf */
        foreach ($original->category as $category) {
            if (userCan('category-update', $category)) {
                $shelf->appendBook($copyCategory);
            }
        }

        return $copyCategory;
    }





    /**
     * Convert an entity to a raw data array of input data.
     *
     * @return array<string, mixed>
     */
    public function entityToInputData(Entity $entity): array
    {
        $inputData = $entity->getAttributes();
        $inputData['tags'] = $this->entityTagsToInputArray($entity);

        // Add a cover to the data if existing on the original entity
        if ($entity instanceof HasCoverImage) {
            $cover = $entity->cover()->first();
            if ($cover) {
                $inputData['image'] = $this->imageToUploadedFile($cover);
            }
        }

        return $inputData;
    }

    /**
     * Copy the permission settings from the source entity to the target entity.
     */
    public function copyEntityPermissions(Entity $sourceEntity, Entity $targetEntity): void
    {
        $permissions = $sourceEntity->permissions()->get(['role_id', 'view', 'create', 'update', 'delete'])->toArray();
        $targetEntity->permissions()->delete();
        $targetEntity->permissions()->createMany($permissions);
        $targetEntity->rebuildPermissions();
    }

    /**
     * Convert an image instance to an UploadedFile instance to mimic
     * a file being uploaded.
     */
    protected function imageToUploadedFile(Image $image): ?UploadedFile
    {
        $imgData = $this->imageService->getImageData($image);
        $tmpImgFilePath = tempnam(sys_get_temp_dir(), 'bs_cover_clone_');
        file_put_contents($tmpImgFilePath, $imgData);

        return new UploadedFile($tmpImgFilePath, basename($image->path));
    }

    /**
     * Convert the tags on the given entity to the raw format
     * that's used for incoming request data.
     */
    protected function entityTagsToInputArray(Entity $entity): array
    {
        $tags = [];

        /** @var Tag $tag */
        foreach ($entity->tags as $tag) {
            $tags[] = ['name' => $tag->name, 'value' => $tag->value];
        }

        return $tags;
    }
}
