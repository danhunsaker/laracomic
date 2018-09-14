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

class Volume extends Model implements HasMedia
{
    use Versionable, SoftDeletes, HasMediaTrait, HasHashSlug, HasTranslations, HasTags, HasStatuses;

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
        'issue_name', 'strip_name', 'comments_enabled'
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

    public $versioned = ['number', 'title', 'description', 'issue_name', 'strip_name', 'comments_enabled', 'updated_at', 'deleted_at'];

    public $translatable = ['title', 'description', 'issue_name', 'strip_name'];

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

        $this->addMediaCollection('cover')
             ->registerMediaConversions(function (Media $media) {
                $this->addMediaConversion('cover_site')
                     ->width(4096)->height(4096)
                     ->withResponsiveImages();
                $this->addMediaConversion('cover_fb')
                     ->width(1200)->height(628);
                $this->addMediaConversion('cover_twitter')
                     ->width(506)->height(253);
                $this->addMediaConversion('cover_instagram')
                     ->width(1080)->height(1080);
                $this->addMediaConversion('cover_linkedin')
                     ->width(180)->height(110);
                $this->addMediaConversion('cover_pinterest')
                     ->width(600);
                $this->addMediaConversion('cover_gplus')
                     ->width(150)->height(150);
                $this->addMediaConversion('cover_youtube')
                     ->width(1546)->height(423);
                $this->addMediaConversion('cover_tumblr')
                     ->width(500)->height(750);
             });
    }

    public function isValidStatus(string $name, ?string $reason = null): bool {
        if (! in_array($name, ['draft', 'pending', 'scheduled', 'private', 'early_access', 'public', 'flagged', 'blocked'])) {
            return false;
        }

        return true;
    }

    public function series() {
        return $this->belongsTo('App\Series');
    }

    public function issues() {
        return $this->hasMany('App\Issue')->orderBy('number', 'asc');
    }

    public function authors() {
        return $this->morphToMany('App\User', 'authorables')->withPivot('role_id', 'created_at', 'updated_at')->using('App\Authority');
    }

    public function comments() {
        return $this->morphMany('App\Comment', 'commentable');
    }

    public function canComment() {
        return empty($this->comments_enabled) ? $this->series->canComment() : $this->comments_enabled;
    }

    public function getIssueNameAttribute($value) {
        return $value ?: $this->series->issue_name;
    }

    public function setIssueNameAttribute($value) {
        $this->attributes['issue_name'] = ($value == $this->series->issue_name) ? null : $this->attributes['issue_name'] = $value;
    }

    public function getStripNameAttribute($value) {
        return $value ?: $this->series->strip_name;
    }

    public function setStripNameAttribute($value) {
        $this->attributes['strip_name'] = ($value == $this->series->strip_name) ? null : $this->attributes['strip_name'] = $value;
    }

    public function image($collection) {
        return collect()->wrap($this->series->image($collection))->prepend($this->getFirstMedia($collection))->filter()->first();
    }

    public function spoilers() {
        return $this->tagsWithType('spoiler')
                    ->merge($this->series->tagsWithType('spoiler'));
    }

    public function warnings() {
        return $this->tagsWithType('warning')
                    ->merge($this->series->tagsWithType('warning'))
                    ->merge($this->issues()->currentStatus('public')->get()->flatMap(function ($issue, $key) {
            return $issue->tagsWithType('warning')->merge($issue->strips()->currentStatus('public')->get()->flatMap(function ($strip, $key) {
                return $strip->tagsWithType('warning');
            }));
        }));
    }
}
