@extends('layouts.app')

@include('layouts.sidebar.series', ['series' => $series])

@include('series.dynamics', ['current' => $strip])

@include('series.cards.strip', ['series' => $series, 'volume' => $volume, 'issue' => $issue, 'strip' => $strip, 'single' => true])

@section('content')
    @yield("strip-pager-{$strip->id}")

    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                @yield("strip-card-{$strip->id}")
            </div>
        </div>
    </div>

    @yield("strip-pager-{$strip->id}")

    <?php $next = $issue->strips->get($issue->strips->search(function ($item, $key) use ($strip) {return $item->id === $strip->id;}) + 1); ?>

    @foreach ($series->news()->where([['created_at', '>=', $strip->created_at], ['created_at', '<', (empty($next) ? \Carbon\Carbon::now() : $next->created_at)]])->latest()->get() as $news)
        @include('series.cards.article', ['series' => $series, 'news' => $news, 'single' => false])
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    @yield("article-card-{$news->id}")
                </div>
            </div>
        </div>
    @endforeach

    @if($strip->canComment())
        {{ ($comments = $strip->comments()->paginate(15)->setPageName('comments'))->links() }}

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
