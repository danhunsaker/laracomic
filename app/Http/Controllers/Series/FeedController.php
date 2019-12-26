<?php

namespace App\Http\Controllers\Series;

use Illuminate\Http\Request;
use Spatie\Feed\Feed;
use Spatie\Feed\Http\FeedController as Controller;

class FeedController extends Controller
{
    public function series(\App\Series $series) {
        return new Feed($series->title, $series->getFeed(), request()->url(), 'feed::feed', $series->description/*, lang*/);
    }

    public function news(\App\Series $series) {
        return new Feed("{$series->title} News", \App\News::getFeed($series), request()->url(), 'feed::feed', "The news feed for {$series->title}"/*, lang*/);
    }
}
