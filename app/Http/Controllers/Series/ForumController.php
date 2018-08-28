<?php

namespace App\Http\Controllers\Series;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ForumController extends Controller
{
    public function forum(\App\Series $series) {
        return view('series/forum', compact('series'));
    }

    public function category(\App\Series $series, \App\Category $category) {
        return view('series/category', compact('series', 'category'));
    }

    public function topic(\App\Series $series, \App\Category $category, \App\Topic $topic) {
        return view('series/topic', compact('series', 'category', 'topic'));
    }

    public function post(\App\Series $series, \App\Category $category, \App\Topic $topic, \App\Post $post) {
        return view('series/post', compact('series', 'category', 'topic', 'post'));
    }
}
