<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Spatie\MediaLibrary\Models\Media as BaseMedia;
use Spatie\Tags\HasTags;
use Spatie\Activitylog\Traits\LogsActivity;

class Media extends BaseMedia
{
    use HasTags, LogsActivity;

    protected static $logAttributes = ['*'];

    protected static $logAttributesToIgnore = ['updated_at', 'deleted_at'];

    protected static $logOnlyDirty = true;

    protected static $logName = 'files';

    public function getDescriptionForEvent(string $eventName): string
    {
        $userName = \Auth::user() ? \Auth::user()->name : 'the system';
        return class_basename(get_class()) . " :subject.file_name {$eventName} by {$userName}";
    }

    public function scopeOrdered(Builder $query): Builder {
        return $query->orderBy($this->determineOrderColumnName(), 'desc');
    }

    public function spoilers() {
        return $this->tagsWithType('spoiler');
    }

    public function warnings() {
        return $this->tagsWithType('warning');
    }
}
