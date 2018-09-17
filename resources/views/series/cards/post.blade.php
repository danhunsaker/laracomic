@section("post-card-{$post->id}")
    <div class="card-header">
        @if (! $single)
            {{ $post->commenter->name }} at
            @if ($post->children->count() > 0)
                <a href="{{ route('post', ['series' => $series->route, 'category' => $category->route, 'topic' => $topic->route, 'post' => $post]) }}">
            @endif
        @else
                {{ $series->title }} – {{ __('Forum') }} –
                <a href="{{ route('category', ['series' => $series->route, 'category' => $category->route]) }}">{{ $category->name }}</a> –
                <a href="{{ route('topic', ['series' => $series->route, 'category' => $category->route, 'topic' => $topic->route]) }}">{{ $topic->name }}</a> –
                {{ $post->commenter->name }} at
        @endif
                {{ $post->created_at }}
        @if (! $single && $post->children->count() > 0)
            </a>
        @elseif ($single && ! empty($post->parent))
            – {{ __('in reply to') }} {{ $post->parent->commenter->name }} at
            <a href="{{ route('post', ['series' => $series->route, 'category' => $category->route, 'topic' => $topic->route, 'post' => $post->parent]) }}">
                {{ $post->parent->created_at }}
            </a>
        @endif
    </div>

    <div class="card-body">
        @if ($post->warnings()->count() > 0)
            @include('layouts.partials.content-warning', ['type' => 'post', 'warnings' => $post->warnings()])
        @endif

        @if ($post->spoilers()->count() > 0)
            @include('layouts.partials.spoiler-warning', ['type' => 'post', 'spoilers' => $post->spoilers()])
        @endif

        <span class="{{ $post->warnings()->count() > 0 ? ' warned' : '' }}{{ $post->spoilers()->count() > 0 ? ' spoiled' : '' }}">
            @markdown($post->content)
        </span>
    </div>
@endsection
