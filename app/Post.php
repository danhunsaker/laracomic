<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use ProAI\Versioning\Versionable;
use ProAI\Versioning\SoftDeletes;
use Balping\HashSlug\HasHashSlug;
use Spatie\Translatable\HasTranslations;
use Spatie\ModelStatus\HasStatuses;
use Spatie\Tags\HasTags;
use Spatie\Activitylog\Traits\LogsActivity;

class Post extends Model
{
    use Versionable, SoftDeletes, HasHashSlug, HasTranslations, HasStatuses, HasTags, LogsActivity;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public $timestamps = true;

    public $versioned = ['content', 'updated_at', 'deleted_at'];

    public $translatable = ['content'];

    protected static $logAttributes = ['content', 'topic.name', '*'];

    protected static $logAttributesToIgnore = ['updated_at', 'deleted_at'];

    protected static $logOnlyDirty = true;

    protected static $logName = 'forum';

    public function getDescriptionForEvent(string $eventName): string
    {
        $userName = \Auth::user() ? \Auth::user()->name : 'the system';
        return class_basename(get_class()) . " on :subject.topic.name.en {$eventName} by {$userName}";
    }

    public function isValidStatus(string $name, ?string $reason = null): bool {
        if (! in_array($name, ['pending', 'approved', 'flagged', 'rejected'])) {
            return false;
        }

        return true;
    }

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

    public function spoilers() {
        return $this->tagsWithType('spoiler')->merge($this->parent ? $this->parent->spoilers() : $this->topic->spoilers());
    }

    public function warnings() {
        return $this->tagsWithType('warning')->merge($this->parent ? $this->parent->warnings() : $this->topic->warnings());
    }
}
