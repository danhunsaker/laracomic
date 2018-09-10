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
            @markdown($topic->description)
        </div>
    @endif
@endsection
