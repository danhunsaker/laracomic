@section("strip-card-{$strip->id}")
    <div class="card-header">
        @if (! $single)
            <a href="{{ route('strip', ['series' => $series->route, 'volume' => $volume->number, 'issue' => $issue->number, 'strip' => $strip->number]) }}">
        @endif
                {{ $series->title }} – {{ title_case($issue->strip_name) }} {{ $strip->number }}: {{ $strip->title }}
        @if (! $single)
            </a>
        @endif
    </div>

    <div class="card-body">
        <div class="strip-image">
            <img src="" alt="{{ $strip->description }}">
        </div>

        @if ($single)
            <p>
                {{ $strip->commentary }}
            </p>
        @endif
    </div>
@endsection
