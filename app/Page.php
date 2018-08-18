<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Balping\HashSlug\HasHashSlug;

class Page extends Model
{
    use SoftDeletes, HasHashSlug;

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
        return empty($this->commentsEnabled) ? (empty($this->parent) ? $this->series->canComment() : $this->parent->canComment()) : $this->commentsEnabled;
    }
}
