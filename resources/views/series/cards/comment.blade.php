@section("comment-card-{$comment->id}")
    <div class="card-header">
        {{ $comment->commenter->name }} at {{ $comment->created_at }}
    </div>

    <div class="card-body">
        @markdown($comment->comment)
    </div>
@endsection
