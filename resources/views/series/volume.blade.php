@extends('layouts.app')

@include('layouts.sidebar.series', ['series' => $series])

@include('series.dynamics', ['current' => $volume])

@include('series.cards.volume', ['series' => $series, 'volume' => $volume, 'single' => true])

@section('content')
@if ($volume->issues->count() == 1)
    @include('series.issue', ['series' => $series, 'volume' => $volume, 'issue' => $volume->issues->first(), 'volume_collapsed' => $volume_collapsed ?? false, 'issue_collapsed' => true])
@else
    @if (isset($volume_collapsed) && $volume_collapsed)
    @else
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    @yield("volume-card-{$volume->id}")
                </div>
            </div>
        </div>
    @endif

    <div>
        @if ($volume->warnings()->count() > 0 || $volume->spoilers()->count() > 0)
            <div class="card warnings">
                <div class="card-body">
                    @if ($volume->warnings()->count() > 0)
                        @include('layouts.partials.content-warning', ['type' => $volume->series->volume_name, 'warnings' => $volume->warnings()])
                    @endif

                    @if ($volume->spoilers()->count() > 0)
                        @include('layouts.partials.spoiler-warning', ['type' => $volume->series->volume_name, 'spoilers' => $volume->spoilers()])
                    @endif
                </div>
            </div>
        @endif

        <div class="row justify-content-center{{ $volume->warnings()->count() > 0 ? ' warned' : '' }}{{ $volume->spoilers()->count() > 0 ? ' spoiled' : '' }}">
            {{ ($pager = $volume->issues()->paginate(15))->links() }}

            @foreach ($pager as $issue)
                @include('series.cards.issue', ['series' => $series, 'volume' => $volume, 'issue' => $issue, 'single' => false])
                <div class="col-12">
                    <div class="card">
                        @yield("issue-card-{$issue->id}")
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
                    @if (isset($volume_collapsed) && $volume_collapsed)
                        Series
                    @else
                        Volume
                    @endif
                    Credits
                 </div>

                <div class="card-body">
                    @yield('credits')
                </div>
            </div>
        </div>
    </div>

    @if($volume->canComment())
        {{ ($comments = $volume->comments()->paginate(15)->setPageName('comments'))->links() }}

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
@endif
@endsection
