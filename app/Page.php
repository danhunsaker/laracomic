<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use ProAI\Versioning\Versionable;
use ProAI\Versioning\SoftDeletes;
use Balping\HashSlug\HasHashSlug;
use Spatie\Translatable\HasTranslations;
use Spatie\Tags\HasTags;
use Spatie\ModelStatus\HasStatuses;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Page extends Model
{
    use Versionable, SoftDeletes, HasHashSlug, HasTranslations, HasTags, HasStatuses, HasSlug;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'comments_enabled'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'comments_enabled' => 'boolean',
    ];

    public $timestamps = true;

    public $versioned = ['parent_id', 'author_id', 'title', 'content', 'comments_enabled', 'updated_at', 'deleted_at'];

    public $translatable = ['title', 'content'];

    public function isValidStatus(string $name, ?string $reason = null): bool {
        if (! in_array($name, ['draft', 'pending', 'scheduled', 'private', 'early_access', 'public', 'flagged', 'blocked'])) {
            return false;
        }

        return true;
    }

    public function getSlugOptions(): SlugOptions {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('route')
            ->slugsShouldBeNoLongerThan(45)
            ->usingLanguage('en')
            ->doNotGenerateSlugsOnUpdate();
    }

    public function series() {
        return $this->belongsTo('App\Series');
    }

    public function parent() {
        return $this->belongsTo('App\Page');
    }

    public function children() {
        return $this->hasMany('App\Page', 'parent_id');
    }

    public function author() {
        return $this->belongsTo('App\User');
    }

    public function comments() {
        return $this->morphMany('App\Comment', 'commentable');
    }

    public function canComment() {
        return empty($this->comments_enabled) ? (empty($this->parent) ? $this->series->canComment() : $this->parent->canComment()) : $this->comments_enabled;
    }

    public function spoilers() {
        return $this->tagsWithType('spoiler');
    }

    public function warnings() {
        return $this->tagsWithType('warning')
                    ->merge($this->parent ? $this->parent->tagsWithType('warning') : [])
                    ->merge($this->series->tagsWithType('warning'));
    }
}
