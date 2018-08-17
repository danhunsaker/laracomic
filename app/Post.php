<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

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
        'approved' => 'boolean',
    ];

    public function topic() {
        return $this->belongsTo('App\Topic');
    }

    public function parent() {
        return $this->belongsTo('App\Post');
    }

    public function children() {
        return $this->hasMany('App\Post', 'parent_id');
    }

    public function commenter() {
        return $this->belongsTo('App\User');
    }
}
