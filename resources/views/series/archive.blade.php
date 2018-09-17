@extends('layouts.app')

@include('layouts.sidebar.series', ['series' => $series])

@include('series.dynamics', ['current' => $series])

@section('content')
    @if ($series->volumes->count() == 1)
        @include('series.volume', ['series' => $series, 'volume' => $series->volumes->first(), 'volume_collapsed' => true])
    @else
        <div>
            @if ($series->warnings()->count() > 0 || $series->spoilers()->count() > 0)
                <div class="card warnings">
                    <div class="card-body">
                        @if ($series->warnings()->count() > 0)
                            @include('layouts.partials.content-warning', ['type' => 'series', 'warnings' => $series->warnings()])
                        @endif

                        @if ($series->spoilers()->count() > 0)
                            @include('layouts.partials.spoiler-warning', ['type' => 'series', 'spoilers' => $series->spoilers()])
                        @endif
                    </div>
                </div>
            @endif

            <div class="row justify-content-center{{ $series->warnings()->count() > 0 ? ' warned' : '' }}{{ $series->spoilers()->count() > 0 ? ' spoiled' : '' }}">
                {{ ($pager = $series->volumes()->paginate(15))->links() }}

                @foreach ($pager as $volume)
                    @include('series.cards.volume', ['series' => $series, 'volume' => $volume, 'single' => false])
                    <div class="col-12">
                        <div class="card">
                            @yield("volume-card-{$volume->id}")
                        </div>
                    </div>
                @endforeach

                {{ $pager->links() }}
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">Series Credits</div>

                    <div class="card-body">
                        @yield('credits')
                    </div>
                </div>
            </div>
        </div>

        @if($series->canComment())
            {{ ($comments = $series->comments()->paginate(15)->setPageName('comments'))->links() }}

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
