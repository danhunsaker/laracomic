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
        {{ $volume->description }}
    </div>
@endsection
