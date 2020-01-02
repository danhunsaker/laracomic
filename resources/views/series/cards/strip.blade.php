@section("strip-pager-{$strip->id}")
    <?php
        $full_list = $series->strips()->map->id;
        $total = $full_list->count();
        $current = $full_list->search($strip->id) + 1;
        $pager = new Illuminate\Pagination\LengthAwarePaginator($series->strips()->forPage($current, 1), $total, 1, $current);
        $pager_options = [
            'first' => $series->strips()->forPage(1, 1)->first(),
            'previous' => $series->strips()->forPage(max($current - 1, 1), 1)->first(),
            'random' => $series->strips()->forPage(rand(1, $total), 1)->first(),
            'next' => $series->strips()->forPage(min($current + 1, $total), 1)->first(),
            'last' => $series->strips()->forPage($total, 1)->first(),
        ];
    ?>
    {{ $pager->links('pagination::strip', $pager_options) }}
@endsection

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
        @if ($strip->warnings()->count() > 0)
            @include('layouts.partials.content-warning', ['type' => $strip->issue->strip_name, 'warnings' => $strip->warnings()])
        @endif

        @if ($strip->spoilers()->count() > 0)
            @include('layouts.partials.spoiler-warning', ['type' => $strip->issue->strip_name, 'spoilers' => $strip->spoilers()])
        @endif

        <span class="{{ $strip->warnings()->count() > 0 ? ' warned' : '' }}{{ $strip->spoilers()->count() > 0 ? ' spoiled' : '' }}">
            @if ($strip->hasMedia('content'))
                <div class="strip-image">
                    {!! with($strip->getFirstMedia('content'))('content_site', ['alt' => $strip->description, 'width' => '100%']) !!}
                </div>
            @else
                <p>{{ __('Image Missing') }}</p>
            @endif

            @if ($single)
                <div class="strip-commentary">
                    @markdown($strip->commentary)
                </div>
            @endif
        </span>
    </div>
@endsection
