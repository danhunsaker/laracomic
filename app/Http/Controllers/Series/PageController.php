<?php

namespace App\Http\Controllers\Series;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function page(\App\Series $series, \App\Page $page) {
        return view('series/page', compact('series', 'page'));
    }
}
