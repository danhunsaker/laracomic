<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use ProAI\Versioning\Versionable;
use ProAI\Versioning\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Balping\HashSlug\HasHashSlug;
use Spatie\Translatable\HasTranslations;
use Spatie\ModelStatus\HasStatuses;

class User extends Authenticatable implements HasMedia
{
    use Notifiable, Versionable, SoftDeletes, HasMediaTrait, HasHashSlug, HasTranslations, HasStatuses;

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
        'is_super'  => 'boolean',
        'is_author' => 'boolean',
    ];

    public $timestamps = true;

    public $versioned = ['name', 'is_author', 'owner_id', 'updated_at', 'deleted_at'];

    public $translatable = ['name'];

    public function registerMediaCollections() {
        $this->addMediaCollection('avatar')
             ->registerMediaConversions(function (Media $media) {
                $this->addMediaConversion('avatar_thumb')
                     ->width(100)->height(100)
                     ->keepOriginalImageFormat();
             })->singleFile();
    }

    public function isValidStatus(string $name, ?string $reason = null): bool {
        if (! in_array($name, ['registered', 'confirmed', 'verified'])) {
            return false;
        }

        return true;
    }

    public function owner() {
        return $this->belongsTo('App\User');
    }

    public function owned() {
        return $this->hasMany('App\User', 'owner_id');
    }

    public function roles() {
        return $this->belongsToMany('App\Role', 'authorables')->withPivot('authorables_id', 'authorables_type', 'created_at', 'updated_at')->using('App\Authority');
    }

    public function series() {
        return $this->morphedByMany('App\Series', 'authorables')->withPivot('role_id', 'created_at', 'updated_at')->using('App\Authority');
    }

    public function volumes() {
        return $this->morphedByMany('App\Volume', 'authorables')->withPivot('role_id', 'created_at', 'updated_at')->using('App\Authority');
    }

    public function issues() {
        return $this->morphedByMany('App\Issue', 'authorables')->withPivot('role_id', 'created_at', 'updated_at')->using('App\Authority');
    }

    public function strips() {
        return $this->morphedByMany('App\Strip', 'authorables')->withPivot('role_id', 'created_at', 'updated_at')->using('App\Authority');
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
