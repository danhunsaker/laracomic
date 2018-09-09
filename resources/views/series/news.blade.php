@extends('layouts.app')

@include('layouts.sidebar.series', ['series' => $series])

@section('content')
    {{ ($pager = $series->news()->paginate(5))->links() }}

    @foreach ($pager as $news)
        @include('series.cards.article', ['series' => $series, 'news' => $news, 'single' => false])
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    @yield("article-card-{$news->id}")
                </div>
            </div>
        </div>
    @endforeach

    {{ $pager->links() }}
@endsection
