@extends('layouts.app')

@include('layouts.sidebar.series', ['series' => $series])

@include('series.dynamics', ['current' => $issue])

@include('series.cards.issue', ['series' => $series, 'volume' => $volume, 'issue' => $issue, 'single' => true])

@section('content')
    @if (isset($issue_collapsed) && $issue_collapsed && isset($volume_collapsed) && $volume_collapsed)
    @else
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    @if (isset($issue_collapsed) && $issue_collapsed)
                        @yield("volume-card-{$volume->id}")
                    @else
                        @yield("issue-card-{$issue->id}")
                    @endif
                </div>
            </div>
        </div>
    @endif

    {{ ($pager = $issue->strips()->paginate(5))->links() }}

    @foreach ($pager as $strip)
        @include('series.cards.strip', ['series' => $series, 'volume' => $volume, 'issue' => $issue, 'strip' => $strip, 'single' => false])
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    @yield("strip-card-{$strip->id}")
                </div>
            </div>
        </div>
    @endforeach

    {{ $pager->links() }}

    @if($issue->canComment())
        {{ ($comments = $issue->comments()->paginate(15)->setPageName('comments'))->links() }}

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
