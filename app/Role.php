<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Balping\HashSlug\HasHashSlug;
use Spatie\Translatable\HasTranslations;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Role extends Model
{
    use SoftDeletes, HasHashSlug, HasTranslations, HasSlug, LogsActivity;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'admin'       => 'boolean',
        'edit_comics' => 'boolean',
        'edit_pages'  => 'boolean',
        'edit_news'   => 'boolean',
        'edit_forums' => 'boolean',
        'moderate'    => 'boolean',
    ];

    /**
     * The attributes that should have default values.
     *
     * @var array
     */
    protected $attributes = [
        'admin'       => false,
        'edit_comics' => false,
        'edit_pages'  => false,
        'edit_news'   => false,
        'edit_forums' => false,
        'moderate'    => false,
    ];

    public $translatable = ['title'];

    protected static $logAttributes = ['*'];

    protected static $logAttributesToIgnore = ['updated_at', 'deleted_at'];

    protected static $logOnlyDirty = true;

    protected static $logName = 'auth';

    public function getDescriptionForEvent(string $eventName): string
    {
        $userName = \Auth::user() ? \Auth::user()->name : 'the system';
        return class_basename(get_class()) . " :subject.title.en {$eventName} by {$userName}";
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('name')
            ->slugsShouldBeNoLongerThan(45)
            ->usingLanguage('en')
            ->doNotGenerateSlugsOnUpdate();
    }

    public function series() {
        return $this->belongsTo('App\Series');
    }

    public function users() {
        return $this->belongsToMany('App\User', 'authorables')->withPivot('authorables_id', 'authorables_type', 'created_at', 'updated_at')->using('App\Authority');
    }
}
