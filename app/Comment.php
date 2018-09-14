<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use ProAI\Versioning\Versionable;
use ProAI\Versioning\SoftDeletes;
use Balping\HashSlug\HasHashSlug;
use Spatie\Translatable\HasTranslations;
use Spatie\ModelStatus\HasStatuses;
use Spatie\Tags\HasTags;

class Comment extends Model
{

    use Versionable, SoftDeletes, HasHashSlug, HasTranslations, HasStatuses, HasTags;
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public $timestamps = true;

    public $versioned = ['comment', 'updated_at', 'deleted_at'];

    public $translatable = ['comment'];

    public function isValidStatus(string $name, ?string $reason = null): bool {
        if (! in_array($name, ['pending', 'approved', 'flagged', 'rejected'])) {
            return false;
        }

        return true;
    }

    public function commentable() {
        return $this->morphTo();
    }

    public function commenter() {
        return $this->belongsTo('App\User');
    }

    public function spoilers() {
        return $this->tagsWithType('spoiler');
    }

    public function warnings() {
        return $this->tagsWithType('warning');
    }
}
