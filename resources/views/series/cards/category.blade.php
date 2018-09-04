@section("category-card-{$category->id}")
    <div class="card-header">
        @if ((isset($link) && $link) || ($single && (isset($link) && $link)))
            {{ $series->title }} – {{ __('Forum') }} –
        @endif
        @if (! $single || (isset($link) && $link))
            <a href="{{ route('category', ['series' => $series->route, 'category' => $category->route]) }}">
        @endif
                {{ $category->name }}
        @if (! $single || (isset($link) && $link))
            </a>
        @endif
    </div>

    @if (! $single)
        <div class="card-body">
            {{ $category->description }}
        </div>
    @endif
@endsection
