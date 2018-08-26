<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (\Auth::user()->is_super) {
            return view('super/dashboard');
        } elseif (\Auth::user()->is_author) {
            return view('author/dashboard');
        } else {
            return view('user/home');
        }
    }
}
