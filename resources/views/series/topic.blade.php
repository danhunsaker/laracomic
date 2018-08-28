@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($topic->posts as $post)
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ $post->commenter->name }} at
                        <a href="{{ route('post', ['series' => $series->route, 'category' => $category->route, 'topic' => $topic->route, 'post' => $post]) }}">
                            {{ $post->created_at }}
                        </a>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ $post->content }}
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
