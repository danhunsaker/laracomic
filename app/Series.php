<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Series extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

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
        'comments_enabled' => 'boolean',
    ];

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
                     ->width(128)->height(128);
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

    public function volumes() {
        return $this->hasMany('App\Volume');
    }

    public function authors() {
        return $this->morphToMany('App\User', 'authorables')->using('App\Authority');
    }

    public function roles() {
        return $this->hasMany('App\Role');
    }

    public function pages() {
        return $this->hasMany('App\Page');
    }

    public function news() {
        return $this->hasMany('App\News');
    }

    public function categories() {
        return $this->hasMany('App\Category');
    }

    public function comments() {
        return $this->morphMany('App\Comment', 'commentable');
    }

    public function canComment() {
        return $this->commentsEnabled;
    }
}
