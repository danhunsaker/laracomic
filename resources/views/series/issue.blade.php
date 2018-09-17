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

    <div>
        @if ($issue->warnings()->count() > 0 || $issue->spoilers()->count() > 0)
            <div class="card warnings">
                <div class="card-body">
                    @if ($issue->warnings()->count() > 0)
                        @include('layouts.partials.content-warning', ['type' => $issue->volume->issue_name, 'warnings' => $issue->warnings()])
                    @endif

                    @if ($issue->spoilers()->count() > 0)
                        @include('layouts.partials.spoiler-warning', ['type' => $issue->volume->issue_name, 'spoilers' => $issue->spoilers()])
                    @endif
                </div>
            </div>
        @endif

        <div class="row{{ $issue->warnings()->count() > 0 ? ' warned' : '' }}{{ $issue->spoilers()->count() > 0 ? ' spoiled' : '' }}">
            {{ ($pager = $issue->strips()->paginate(12))->links() }}

            @foreach ($pager as $strip)
                @include('series.cards.strip', ['series' => $series, 'volume' => $volume, 'issue' => $issue, 'strip' => $strip, 'single' => false])
                <div class="col-sm-6 col-lg-4 col-xl-3">
                    <div class="card">
                        @yield("strip-card-{$strip->id}")
                    </div>
                </div>
            @endforeach

            {{ $pager->links() }}
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    @if (isset($issue_collapsed) && $issue_collapsed)
                        @if (isset($volume_collapsed) && $volume_collapsed)
                            Series
                        @else
                            Volume
                        @endif
                    @else
                        Issue
                    @endif
                    Credits
                 </div>

                <div class="card-body">
                    @yield('credits')
                </div>
            </div>
        </div>
    </div>

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
