@extends('layouts.app')

@include('layouts.sidebar.series', ['series' => $series])

@include('series.cards.strip', [
    'series' => $series,
    'volume' => ($volume = $series->volumes->last()),
    'issue' => ($issue = $volume->issues->last()),
    'strip' => ($strip = $issue->strips->last()),
    'single' => true,
])

@include('series.dynamics', ['current' => $strip])

@section('content')
    @yield("strip-pager-{$strip->id}")

    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                @yield("strip-card-{$strip->id}")
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Credits</div>

                <div class="card-body">
                    @yield('credits')
                </div>
            </div>
        </div>
    </div>

    @yield("strip-pager-{$strip->id}")

    @foreach ($series->news()->where('created_at', '>=', $strip->created_at)->latest()->get() as $news)
        @include('series.cards.article', ['series' => $series, 'news' => $news, 'single' => false])
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    @yield("article-card-{$news->id}")
                </div>
            </div>
        </div>
    @endforeach
@endsection
