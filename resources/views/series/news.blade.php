@extends('layouts.app')

@include('layouts.sidebar.series', ['series' => $series])

@section('content')
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
