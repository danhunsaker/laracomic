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

    {{ ($pager = $volume->issues()->paginate(15))->links() }}

    @foreach ($pager as $issue)
        @include('series.cards.issue', ['series' => $series, 'volume' => $volume, 'issue' => $issue, 'single' => false])
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    @yield("issue-card-{$issue->id}")
                </div>
            </div>
        </div>
    @endforeach

    {{ $pager->links() }}
@endif
@endsection
