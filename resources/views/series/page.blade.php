@extends('layouts.app')

@include('layouts.sidebar.series', ['series' => $series])

@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ $page->title }}</div>

                <div class="card-body">
                    @markdown($page->content)
                </div>
            </div>
        </div>
    </div>

    @if($page->canComment())
        {{ ($comments = $page->comments()->paginate(15)->setPageName('comments'))->links() }}

        <ul>
            @foreach ($comments as $comment)
                @include('series.cards.comment', ['series' => $series, 'comment' => $comment])
                <li class="row justify-content-center">
                    <div class="col">
                        <div class="card">
                            @yield("comment-card-{$comment->id}")
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>

        {{ $comments->links() }}
    @endif
@endsection
