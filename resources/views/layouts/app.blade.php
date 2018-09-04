<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ (empty($title) ? '' : $title . ' | ') . (empty($series) ? ($root_name ?? config('app.name', 'LaraComic!')) : $series->title) }}</title>

    <!-- Feeds -->
    @include('feed::links')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/opendyslexic" type="text/css"/>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container-fluid">
                <span class="navbar-brand">
                    <a href="{{ route('landing') }}">{{ $root_name ?? config('app.name', 'LaraComic!') }}</a>
                    @if (! empty($series)) <?php URL::defaults(['series' => $series->route]); ?>
                        » <a href="{{ route('series') }}">{{ $series->title }}</a>
                    @endif
                </span>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @if (! empty($series))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('archive') }}">{{ __('Archive') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('news') }}">{{ __('News') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('forum') }}">{{ __('Forum') }}</a>
                            </li>
                            @foreach (App\Page::where(['series_id' => $series->id, 'parent_id' => null])->get() as $page)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('page', ['page' => $page->route]) }}">{{ $page->title }}</a>
                                </li>
                            @endforeach
                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('home') }}">
                                        {{ __('Dashboard') }}
                                    </a>

                                    <a class="dropdown-item" href="{{ route('logout') }}" id="logout-link">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @include('layouts.sidebar.main')

        <main class="py-4">
            <div class="container-fluid">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="row justify-content-center">
                    <div class="col">
                        @yield('content')
                    </div>

                    <div class="col-md-4">
                        @yield('sidebar')
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
