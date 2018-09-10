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

    @if($news->canComment())
        {{ ($comments = $news->comments()->paginate(15)->setPageName('comments'))->links() }}

        <ul>
            @foreach ($comments as $comment)
                @include('series.cards.comment', ['series' => $series, 'comment' => $comment])
                <li class="row justify-content-center">
                    <div class="col">
                        <div class="card">
                            @yield("comment-card-{$comment->id}")
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>

        {{ $comments->links() }}
    @endif
@endsection
