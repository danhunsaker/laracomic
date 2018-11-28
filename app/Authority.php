<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\MorphPivot;
use Balping\HashSlug\HasHashSlug;
use Spatie\Activitylog\Traits\LogsActivity;

class Authority extends MorphPivot
{
    use HasHashSlug, LogsActivity;

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

    protected static $logAttributes = ['*'];

    protected static $logAttributesToIgnore = ['updated_at', 'deleted_at'];

    protected static $logOnlyDirty = true;

    protected static $logName = 'auth';

    public function getDescriptionForEvent(string $eventName): string
    {
        $userName = \Auth::user() ? \Auth::user()->name : 'the system';
        return class_basename(get_class()) . " object {$eventName} by {$userName}";
    }

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
