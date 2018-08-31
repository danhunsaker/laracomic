<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\MorphPivot;
use Balping\HashSlug\HasHashSlug;

class Authority extends MorphPivot
{
    use HasHashSlug;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'authorables';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function authorables() {
        return $this->morphTo();
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function role() {
        return $this->belongsTo('App\Role');
    }
}
