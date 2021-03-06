<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use ProAI\Versioning\Versionable;
use ProAI\Versioning\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Balping\HashSlug\HasHashSlug;
use Spatie\Translatable\HasTranslations;
use Spatie\Tags\HasTags;
use Spatie\ModelStatus\HasStatuses;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;
use Spatie\Activitylog\Traits\LogsActivity;

class Strip extends Model implements HasMedia, Feedable
{
    use Versionable, SoftDeletes, HasMediaTrait, HasHashSlug, HasTranslations, HasTags, HasStatuses, LogsActivity;

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

    public $versioned = ['number', 'title', 'description', 'commentary', 'comments_enabled', 'updated_at', 'deleted_at'];

    public $translatable = ['title', 'description', 'commentary'];

    protected static $logAttributes = ['number', 'title', 'description', 'commentary', 'comments_enabled', '*'];

    protected static $logAttributesToIgnore = ['updated_at', 'deleted_at'];

    protected static $logOnlyDirty = true;

    protected static $logName = 'comic';

    public function getDescriptionForEvent(string $eventName): string
    {
        $userName = \Auth::user() ? \Auth::user()->name : 'the system';
        return class_basename(get_class()) . " :subject.title.en {$eventName} by {$userName}";
    }

    public function registerMediaCollections() {
        $this->addMediaCollection('banner')
             ->registerMediaConversions(function (Media $media) {
                $this->addMediaConversion('banner_site')
                     ->width(1750)->height(250)
                     ->withResponsiveImages();
                $this->addMediaConversion('banner_fb')
                     ->width(820)->height(312);
                $this->addMediaConversion('banner_twitter')
                     ->width(1500)->height(500);
                $this->addMediaConversion('banner_linkedin')
                     ->width(1584)->height(396);
                $this->addMediaConversion('banner_gplus')
                     ->width(1080)->height(608);
                $this->addMediaConversion('banner_comicrocket')
                     ->width(468)->height(60);
             });

        $this->addMediaCollection('logo')
             ->registerMediaConversions(function (Media $media) {
                $this->addMediaConversion('logo_site')
                     ->width(1024)->height(1024)
                     ->withResponsiveImages();
                $this->addMediaConversion('logo_favicon')
                     ->width(128)->height(128)
                     ->keepOriginalImageFormat();
                $this->addMediaConversion('logo_fb')
                     ->width(180)->height(180);
                $this->addMediaConversion('logo_twitter')
                     ->width(400)->height(400);
                $this->addMediaConversion('logo_instagram')
                     ->width(110)->height(110);
                $this->addMediaConversion('logo_linkedin')
                     ->width(400)->height(400);
                $this->addMediaConversion('logo_pinterest')
                     ->width(165)->height(165);
                $this->addMediaConversion('logo_gplus')
                     ->width(250)->height(250);
                $this->addMediaConversion('logo_youtube')
                     ->width(800)->height(800);
                $this->addMediaConversion('logo_tumblr')
                     ->width(128)->height(128);
             });

        $this->addMediaCollection('content')
             ->registerMediaConversions(function (Media $media) {
                $this->addMediaConversion('content_site')
                     ->width(4096)->height(4096)
                     ->withResponsiveImages();
                $this->addMediaConversion('content_fb')
                     ->width(1200)->height(628);
                $this->addMediaConversion('content_twitter')
                     ->width(506)->height(253);
                $this->addMediaConversion('content_instagram')
                     ->width(1080)->height(1080);
                $this->addMediaConversion('content_linkedin')
                     ->width(180)->height(110);
                $this->addMediaConversion('content_pinterest')
                     ->width(600);
                $this->addMediaConversion('content_gplus')
                     ->width(150)->height(150);
                $this->addMediaConversion('content_youtube')
                     ->width(1546)->height(423);
                $this->addMediaConversion('content_tumblr')
                     ->width(500)->height(750);
             });
    }

    public function isValidStatus(string $name, ?string $reason = null): bool {
        if (! in_array($name, ['draft', 'pending', 'scheduled', 'private', 'early_access', 'public', 'flagged', 'blocked'])) {
            return false;
        }

        return true;
    }

    public function toFeedItem() {
        return FeedItem::create([
            'id' => $this->slug(),
            'title' => $this->title,
            'summary' => $this->commentary,
            'updated' => $this->updated_at,
            'link' => trim(str_replace(
                ["series={$this->issue->volume->series->route}", '?&'],
                ['', '?'],
                route('strip', [
                    'series' => $this->issue->volume->series->route,
                    'volume' => $this->issue->volume->number,
                    'issue' => $this->issue->number,
                    'strip' => $this->number,
                ], false)
            ), '?'),
            'author' => $this->authors,
        ]);
    }

    public function issue() {
        return $this->belongsTo('App\Issue');
    }

    public function authors() {
        return $this->morphToMany('App\User', 'authorables')->withPivot('role_id', 'created_at', 'updated_at')->using('App\Authority');
    }

    public function comments() {
        return $this->morphMany('App\Comment', 'commentable');
    }

    public function canComment() {
        return empty($this->comments_enabled) ? $this->issue->canComment() : $this->comments_enabled;
    }

    public function image($collection) {
        return collect()->wrap($this->issue->image($collection))->prepend($this->getFirstMedia($collection))->filter()->first();
    }

    public function spoilers() {
        return $this->tagsWithType('spoiler')
                    ->merge($this->issue->volume->series->tagsWithType('spoiler'))
                    ->merge($this->issue->volume->tagsWithType('spoiler'))
                    ->merge($this->issue->tagsWithType('spoiler'));
    }

    public function warnings() {
        return $this->tagsWithType('warning')
                    ->merge($this->issue->volume->series->tagsWithType('warning'))
                    ->merge($this->issue->volume->tagsWithType('warning'))
                    ->merge($this->issue->tagsWithType('warning'));
    }
}
