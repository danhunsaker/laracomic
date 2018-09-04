@extends('layouts.app')

@include('layouts.sidebar.series', ['series' => $series])

@include('series.cards.strip', ['series' => $series, 'volume' => $volume, 'issue' => $issue, 'strip' => $strip, 'single' => true])

@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                @yield("strip-card-{$strip->id}")
            </div>
        </div>
    </div>
@endsection
