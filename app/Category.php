<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Balping\HashSlug\HasHashSlug;

class Category extends Model
{
    use SoftDeletes, HasHashSlug;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

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
}
