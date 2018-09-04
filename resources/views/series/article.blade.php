@extends('layouts.app')

@include('layouts.sidebar.series', ['series' => $series])

@include('series.cards.article', ['series' => $series, 'news' => $news, 'single' => true])

@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                @yield("article-card-{$news->id}")
            </div>
        </div>
    </div>
@endsection
