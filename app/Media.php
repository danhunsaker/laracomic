<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Spatie\MediaLibrary\Models\Media as BaseMedia;
use Spatie\Tags\HasTags;

class Media extends BaseMedia
{
    use HasTags;

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
