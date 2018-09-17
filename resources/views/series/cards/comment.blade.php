@section("comment-card-{$comment->id}")
    <div class="card-header">
        {{ $comment->commenter->name }} at {{ $comment->created_at }}
    </div>

    <div class="card-body">
        @if ($comment->warnings()->count() > 0)
            @include('layouts.partials.content-warning', ['type' => 'comment', 'warnings' => $comment->warnings()])
        @endif

        @if ($comment->spoilers()->count() > 0)
            @include('layouts.partials.spoiler-warning', ['type' => 'comment', 'spoilers' => $comment->spoilers()])
        @endif

        <span class="{{ $comment->warnings()->count() > 0 ? ' warned' : '' }}{{ $comment->spoilers()->count() > 0 ? ' spoiled' : '' }}">
            @markdown($comment->comment)
        </span>
    </div>
@endsection
