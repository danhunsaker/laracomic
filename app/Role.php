<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Balping\HashSlug\HasHashSlug;

class Role extends Model
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
        'admin'       => 'boolean',
        'edit_comics' => 'boolean',
        'edit_pages'  => 'boolean',
        'edit_news'   => 'boolean',
        'edit_forums' => 'boolean',
        'moderate'    => 'boolean',
    ];

    public function series() {
        return $this->belongsTo('App\Series');
    }

    public function users() {
        return $this->belongsToMany('App\User', 'authorables')->using('App\Authority');
    }
}
