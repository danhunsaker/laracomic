<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class User extends Authenticatable implements HasMedia
{
    use Notifiable, SoftDeletes, HasMediaTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'is_author',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_author' => 'boolean',
        'is_super'  => 'boolean',
    ];

    public function registerMediaCollections()
    {
        $this->addMediaCollection('avatar')
             ->registerMediaConversions(function (Media $media) {
                $this->addMediaConversion('avatar_thumb')
                     ->width(100)
                     ->height(100);
             })->singleFile();
    }

    public function owner() {
        return $this->belongsTo('App\User');
    }

    public function owned() {
        return $this->hasMany('App\User', 'owner_id');
    }

    public function roles() {
        return $this->belongsToMany('App\Role', 'authorables')->using('App\Authority');
    }

    public function series() {
        return $this->morphedByMany('App\Series', 'authorables')->using('App\Authority');
    }

    public function volumes() {
        return $this->morphedByMany('App\Volume', 'authorables')->using('App\Authority');
    }

    public function issues() {
        return $this->morphedByMany('App\Issue', 'authorables')->using('App\Authority');
    }

    public function strips() {
        return $this->morphedByMany('App\Strip', 'authorables')->using('App\Authority');
    }

    public function pages() {
        return $this->hasMany('App\Page', 'author_id');
    }

    public function articles() {
        return $this->hasMany('App\News', 'author_id');
    }

    public function comments() {
        return $this->hasMany('App\Comment', 'commenter_id');
    }

    public function posts() {
        return $this->hasMany('App\Post', 'commenter_id');
    }
}
