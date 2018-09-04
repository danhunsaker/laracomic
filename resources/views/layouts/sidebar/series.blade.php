@include('series.cards.series', ['series' => $series])

@section('sidebar')
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                @yield("series-card-{$series->id}")
            </div>
        </div>
    </div>
@endsection
