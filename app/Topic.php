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

class Topic extends Model
{
    use Versionable, SoftDeletes, HasHashSlug, HasTranslations, HasTags, HasStatuses, HasSlug;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public $timestamps = true;

    public $versioned = ['name', 'description', 'updated_at', 'deleted_at'];

    public $translatable = ['name', 'description'];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('route')
            ->slugsShouldBeNoLongerThan(45)
            ->usingLanguage('en')
            ->doNotGenerateSlugsOnUpdate();
    }

    public function isValidStatus(string $name, ?string $reason = null): bool {
        if (! in_array($name, ['unlocked', 'flagged', 'locked'])) {
            return false;
        }

        return true;
    }

    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function posts() {
        return $this->hasMany('App\Post');
    }
}
