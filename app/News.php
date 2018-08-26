<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use ProAI\Versioning\Versionable;
use ProAI\Versioning\SoftDeletes;
use Balping\HashSlug\HasHashSlug;
use Spatie\Translatable\HasTranslations;
use Spatie\Tags\HasTags;
use Spatie\ModelStatus\HasStatuses;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;

class News extends Model implements Feedable
{
    use Versionable, SoftDeletes, HasHashSlug, HasTranslations, HasTags, HasStatuses;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'comments_enabled'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'comments_enabled' => 'boolean',
    ];

    public $timestamps = true;

    public $versioned = ['author_id', 'headline', 'article', 'comments_enabled', 'updated_at', 'deleted_at'];

    public $translatable = ['headline', 'article'];

    public function isValidStatus(string $name, ?string $reason = null): bool {
        if (! in_array($name, ['draft', 'pending', 'scheduled', 'private', 'early_access', 'public', 'flagged', 'blocked'])) {
            return false;
        }

        return true;
    }

    public function toFeedItem() {
        return FeedItem::create([
            'id' => $this->slug,
            'title' => $this->headline,
            'summary' => $this->article,
            'updated' => $this->updated_at,
            'link' => route('article', [
                'series' => $this->series->route,
                'news' => $this->slug,
            ], false),
            'author' => $this->author,
        ]);
    }

    public function series() {
        return $this->belongsTo('App\Series');
    }

    public function author() {
        return $this->belongsTo('App\User');
    }

    public function comments() {
        return $this->morphMany('App\Comment', 'commentable');
    }

    public function canComment() {
        return empty($this->commentsEnabled) ? $this->series->canComment() : $this->commentsEnabled;
    }

    public function getFeed($series) {
        return static::currentStatus('public')->where(['series_id' => $series->id])->get();
    }
}
