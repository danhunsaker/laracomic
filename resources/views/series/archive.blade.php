@extends('layouts.app')

@include('layouts.sidebar.series', ['series' => $series])

@include('series.dynamics', ['current' => $series])

@section('content')
    @if ($series->volumes->count() == 1)
        @include('series.volume', ['series' => $series, 'volume' => $series->volumes->first(), 'volume_collapsed' => true])
    @else
        {{ ($pager = $series->volumes()->paginate(15))->links() }}

        @foreach ($pager as $volume)
            @include('series.cards.volume', ['series' => $series, 'volume' => $volume, 'single' => false])
            <div class="row justify-content-center">
                <div class="col">
                    <div class="card">
                        @yield("volume-card-{$volume->id}")
                    </div>
                </div>
            </div>
        @endforeach

        {{ $pager->links() }}
    @endif
@endsection
