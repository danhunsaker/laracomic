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
use Spatie\Activitylog\Traits\LogsActivity;

class Topic extends Model
{
    use Versionable, SoftDeletes, HasHashSlug, HasTranslations, HasTags, HasStatuses, HasSlug, LogsActivity;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public $timestamps = true;

    public $versioned = ['name', 'description', 'updated_at', 'deleted_at'];

    public $translatable = ['name', 'description'];

    protected static $logAttributes = ['name', 'description', '*'];

    protected static $logAttributesToIgnore = ['updated_at', 'deleted_at'];

    protected static $logOnlyDirty = true;

    protected static $logName = 'forum';

    public function getDescriptionForEvent(string $eventName): string
    {
        $userName = \Auth::user() ? \Auth::user()->name : 'the system';
        return class_basename(get_class()) . " :subject.name.en {$eventName} by {$userName}";
    }

    public function getSlugOptions(): SlugOptions {
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

    public function spoilers() {
        return $this->tagsWithType('spoiler')->merge($this->category->spoilers());
    }

    public function warnings() {
        return $this->tagsWithType('warning')->merge($this->category->warnings());
    }
}
