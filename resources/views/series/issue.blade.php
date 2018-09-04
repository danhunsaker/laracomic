@extends('layouts.app')

@include('layouts.sidebar.series', ['series' => $series])

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

    @foreach ($issue->strips as $strip)
        @include('series.cards.strip', ['series' => $series, 'volume' => $volume, 'issue' => $issue, 'strip' => $strip, 'single' => false])
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    @yield("strip-card-{$strip->id}")
                </div>
            </div>
        </div>
    @endforeach
@endsection
