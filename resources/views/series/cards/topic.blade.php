@section("topic-card-{$topic->id}")
    <div class="card-header">
        @if (! $single)
            <a href="{{ route('topic', ['series' => $series->route, 'category' => $category->route, 'topic' => $topic->route]) }}">
        @else
                {{ $series->title }} – {{ __('Forum') }} –
                <a href="{{ route('category', ['series' => $series->route, 'category' => $category->route]) }}">{{ $category->name }}</a> –
        @endif
                {{ $topic->name }}
        @if (! $single)
            </a>
        @endif
    </div>

    @if (! $single)
        <div class="card-body">
            @if ($topic->warnings()->count() > 0)
                @include('layouts.partials.content-warning', ['type' => 'topic', 'warnings' => $topic->warnings()])
            @endif

            @if ($topic->spoilers()->count() > 0)
                @include('layouts.partials.spoiler-warning', ['type' => 'topic', 'spoilers' => $topic->spoilers()])
            @endif

            <span class="{{ $topic->warnings()->count() > 0 ? ' warned' : '' }}{{ $topic->spoilers()->count() > 0 ? ' spoiled' : '' }}">
                @markdown($topic->description)
            </span>
        </div>
    @endif
@endsection
