<?php

namespace BookStack\Activity\Models;

use BookStack\App\Model;
use BookStack\Entities\Models\Entity;
use BookStack\Permissions\Models\JointPermission;
use BookStack\Users\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

/**
 * @property string $type
 * @property User   $user
 * @property Entity $entity
 * @property string $detail
 * @property string $entity_type
 * @property int    $entity_id
 * @property int    $user_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Activity extends Model
{
    /**
     * Get the entity for this activity.
     */
    public function entity(): MorphTo
    {
        if ($this->entity_type === '') {
            $this->entity_type = null;
        }

        return $this->morphTo('entity');
    }

    /**
     * Get the user this activity relates to.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function jointPermissions(): HasMany
    {
        return $this->hasMany(JointPermission::class, 'entity_id', 'entity_id')
            ->whereColumn('activities.entity_type', '=', 'joint_permissions.entity_type');
    }

    /**
     * Returns text from the language files, Looks up by using the activity key.
     */
    public function getText(): string
    {
        return trans('activities.' . $this->type);
    }

    /**
     * Check if this activity is intended to be for an entity.
     */
    public function isForEntity(): bool
    {
        return Str::startsWith($this->type, [
            'page_', 'chapter_', 'book_', 'bookshelf_',
        ]);
    }

    /**
     * Checks if another Activity matches the general information of another.
     */
    public function isSimilarTo(self $activityB): bool
    {
        return [$this->type, $this->entity_type, $this->entity_id] === [$activityB->type, $activityB->entity_type, $activityB->entity_id];
    }
}
