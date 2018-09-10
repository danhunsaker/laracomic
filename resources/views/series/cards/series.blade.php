@section("series-card-{$series->id}")
    <div class="card-header">{{ $series->title }}</div>

    <div class="card-body">
        @markdown($series->description)
    </div>
@endsection
