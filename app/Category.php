<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use ProAI\Versioning\Versionable;
use ProAI\Versioning\SoftDeletes;
use Balping\HashSlug\HasHashSlug;
use Spatie\Translatable\HasTranslations;
use Spatie\Tags\HasTags;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Category extends Model
{
    use Versionable, SoftDeletes, HasHashSlug, HasTranslations, HasTags, HasSlug, LogsActivity;

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

    public function series() {
        return $this->belongsTo('App\Series');
    }

    public function parent() {
        return $this->belongsTo('App\Category');
    }

    public function children() {
        return $this->hasMany('App\Category', 'parent_id');
    }

    public function topics() {
        return $this->hasMany('App\Topic');
    }

    public function spoilers() {
        return $this->tagsWithType('spoiler')->merge($this->parent ? $this->parent->spoilers() : []);
    }

    public function warnings() {
        return $this->tagsWithType('warning')->merge($this->parent ? $this->parent->warnings() : []);
    }
}
