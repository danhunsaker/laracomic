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
        @markdown($news->article)
    </div>
@endsection
