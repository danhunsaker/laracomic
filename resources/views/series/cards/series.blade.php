@section("series-card-{$series->id}")
    <div class="card-header">{{ $series->title }}</div>

    <div class="card-body">
        @if ($series->hasMedia('cover'))
            <div class="series-image">
                {!! with($series->getFirstMedia('cover'))('cover_site', ['alt' => __(':title Cover', ['title' => $series->title]), 'width' => '100%']) !!}
            </div>
        @endif

        <div class="series-description">
            @markdown($series->description)
        </div>
    </div>
@endsection
