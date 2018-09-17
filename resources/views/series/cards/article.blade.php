@section("article-card-{$news->id}")
    <div class="card-header">
        @if (! $single)
            <a href="{{ route('article', ['series' => $series->route, 'news' => $news]) }}">
        @endif
                {{ $news->headline }}
        @if (! $single)
            </a>
        @endif
        by {{ $news->author->name }} at {{ $news->created_at }}
    </div>

    <div class="card-body">
        @if ($news->warnings()->count() > 0)
            @include('layouts.partials.content-warning', ['type' => 'article', 'warnings' => $news->warnings()])
        @endif

        @if ($news->spoilers()->count() > 0)
            @include('layouts.partials.spoiler-warning', ['type' => 'article', 'spoilers' => $news->spoilers()])
        @endif

        <span class="{{ $news->warnings()->count() > 0 ? ' warned' : '' }}{{ $news->spoilers()->count() > 0 ? ' spoiled' : '' }}">
            @markdown($news->article)
        </span>
    </div>
@endsection
