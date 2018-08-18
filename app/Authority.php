<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Balping\HashSlug\HasHashSlug;

class Authority extends Pivot
{
    use HasHashSlug;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function authorable() {
        return $this->morphTo();
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function role() {
        return $this->belongsTo('App\Role');
    }
}
