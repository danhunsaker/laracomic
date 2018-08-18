<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Balping\HashSlug\HasHashSlug;

class Comment extends Model
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
        'approved' => 'boolean',
    ];

    public function commentable() {
        return $this->morphTo();
    }

    public function commenter() {
        return $this->belongsTo('App\User');
    }
}
