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
        {{ $issue->description }}
    </div>
@endsection
