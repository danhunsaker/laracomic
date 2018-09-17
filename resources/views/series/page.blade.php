@extends('layouts.app')

@include('layouts.sidebar.series', ['series' => $series])

@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ $page->title }}</div>

                <div class="card-body">
                    @if ($page->warnings()->count() > 0)
                        @include('layouts.partials.content-warning', ['type' => 'page', 'warnings' => $page->warnings()])
                    @endif

                    @if ($page->spoilers()->count() > 0)
                        @include('layouts.partials.spoiler-warning', ['type' => 'page', 'spoilers' => $page->spoilers()])
                    @endif

                    <span class="{{ $page->warnings()->count() > 0 ? ' warned' : '' }}{{ $page->spoilers()->count() > 0 ? ' spoiled' : '' }}">
                        @markdown($page->content)
                    </span>
                </div>
            </div>
        </div>
    </div>

    @if($page->canComment())
        {{ ($comments = $page->comments()->paginate(15)->setPageName('comments'))->links() }}

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
