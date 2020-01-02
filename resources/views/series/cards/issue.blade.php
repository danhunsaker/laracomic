@section("issue-card-{$issue->id}")
    <div class="card-header">
        @if (! $single)
            <a href="{{ route('issue', ['series' => $series->route, 'volume' => $volume->number, 'issue' => $issue->number]) }}">
        @endif
                {{ $series->title }} – {{ title_case($volume->issue_name) }} {{ $issue->number }}: {{ $issue->title }}
        @if (! $single)
            </a>
        @endif
    </div>

    <div class="card-body">
        @if ($issue->warnings()->count() > 0)
            @include('layouts.partials.content-warning', ['type' => $issue->volume->issue_name, 'warnings' => $issue->warnings()])
        @endif

        @if ($issue->spoilers()->count() > 0)
            @include('layouts.partials.spoiler-warning', ['type' => $issue->volume->issue_name, 'spoilers' => $issue->spoilers()])
        @endif

        <span class="{{ $issue->warnings()->count() > 0 ? ' warned' : '' }}{{ $issue->spoilers()->count() > 0 ? ' spoiled' : '' }}">
            @if ($issue->hasMedia('cover'))
                <div class="issue-image">
                    {!! with($issue->getFirstMedia('cover'))('cover_site', ['alt' => __(':name :number Cover', ['name' => title_case($volume->issue_name), 'number' => $issue->number]), 'width' => '100%']) !!}
                </div>
            @endif

            <div class="issue-description">
                @markdown($issue->description)
            </div>
        </span>
    </div>
@endsection
