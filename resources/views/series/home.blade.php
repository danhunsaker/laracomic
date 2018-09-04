@extends('layouts.app')

@include('layouts.sidebar.series', ['series' => $series])

@include('series.cards.strip', [
    'series' => $series,
    'volume' => ($volume = $series->volumes()->latest()->first()),
    'issue' => ($issue = $volume->issues()->latest()->first()),
    'strip' => ($strip = $issue->strips()->latest()->first()),
    'single' => true,
])

@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                @yield("strip-card-{$strip->id}")
            </div>
        </div>
    </div>

    @foreach ($series->news as $news)
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
