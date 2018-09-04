@section("article-card-{$news->id}")
    <div class="card-header">
        @if (! $single)
            <a href="{{ route('article', ['series' => $series->route, 'news' => $news]) }}">
        @endif
                {{ $news->headline }}
        @if (! $single)
            </a>
        @endif
    </div>

    <div class="card-body">
        {{ $news->article }}
    </div>
@endsection
