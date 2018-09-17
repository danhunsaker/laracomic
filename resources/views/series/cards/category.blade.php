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
            @if ($category->warnings()->count() > 0)
                @include('layouts.partials.content-warning', ['type' => 'category', 'warnings' => $category->warnings()])
            @endif

            @if ($category->spoilers()->count() > 0)
                @include('layouts.partials.spoiler-warning', ['type' => 'category', 'spoilers' => $category->spoilers()])
            @endif

            <span class="{{ $category->warnings()->count() > 0 ? ' warned' : '' }}{{ $category->spoilers()->count() > 0 ? ' spoiled' : '' }}">
                @markdown($category->description)
            </span>
        </div>
    @endif
@endsection
