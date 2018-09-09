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
        <div class="strip-image">
            {!! with($strip->getFirstMedia('content'))('content_site', ['alt' => $strip->description, 'width' => '100%']) !!}
        </div>

        @if ($single)
            {{ $strip->commentary }}
        @endif
    </div>
@endsection
