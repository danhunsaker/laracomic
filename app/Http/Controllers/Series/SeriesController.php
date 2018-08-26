<?php

namespace App\Http\Controllers\Series;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SeriesController extends Controller
{
    public function home(\App\Series $series) {
        return view('series/home', compact('series'));
    }

    public function archive(\App\Series $series) {
        return view('series/archive', compact('series'));
    }

    public function volume(\App\Series $series, \App\Volume $volume) {
        return view('series/volume', compact('series', 'volume'));
    }

    public function issue(\App\Series $series, \App\Volume $volume, \App\Issue $issue) {
        return view('series/issue', compact('series', 'volume', 'issue'));
    }

    public function strip(\App\Series $series, \App\Volume $volume, \App\Issue $issue, \App\Strip $strip) {
        return view('series/strip', compact('series', 'volume', 'issue', 'strip'));
    }
}
