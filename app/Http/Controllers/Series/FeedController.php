<?php

namespace App\Http\Controllers\Series;

use Illuminate\Http\Request;
use Spatie\Feed\Feed;
use Spatie\Feed\Http\FeedController as Controller;

class FeedController extends Controller
{
    public function series(\App\Series $series) {
        return new Feed(
            $series->title,
            request()->url(),
            [[$series, 'getFeed']],
            'feed::feed'
        );
    }

    public function news(\App\Series $series) {
        return new Feed(
            "{$series->title} News",
            request()->url(),
            ['App\News@getFeed', $series],
            'feed::feed'
        );
    }
}
