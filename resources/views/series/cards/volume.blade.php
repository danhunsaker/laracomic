@section("volume-card-{$volume->id}")
    <div class="card-header">
        @if (! $single)
            <a href="{{ route('volume', ['series' => $series->route, 'volume' => $volume->number]) }}">
        @endif
                {{ $series->title }} – {{ title_case($series->volume_name) }} {{ $volume->number }}: {{ $volume->title }}
        @if (! $single)
            </a>
        @endif
    </div>

    <div class="card-body">
        @if ($volume->hasMedia('cover'))
            <div class="volume-image">
                {!! with($volume->getFirstMedia('cover'))('cover_site', ['alt' => __(':name :number Cover', ['name' => title_case($series->volume_name), 'number' => $volume->number]), 'width' => '100%']) !!}
            </div>
        @endif

        <div class="volume-description">
            @markdown($volume->description)
        </div>
    </div>
@endsection
