<?php

namespace App\Http\Controllers\Series;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    public function news(\App\Series $series) {
        return view('series/news', compact('series'));
    }

    public function article(\App\Series $series, \App\News $news) {
        return view('series/article', compact('series', 'news'));
    }
}
