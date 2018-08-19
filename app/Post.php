<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use ProAI\Versioning\Versionable;
use ProAI\Versioning\SoftDeletes;
use Balping\HashSlug\HasHashSlug;
use Spatie\Translatable\HasTranslations;
use Spatie\ModelStatus\HasStatuses;

class Post extends Model
{
    use Versionable, SoftDeletes, HasHashSlug, HasTranslations, HasStatuses;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public $timestamps = true;

    public $versioned = ['content', 'updated_at', 'deleted_at'];

    public $translatable = ['content'];

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
}
