@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($category->topics as $topic)
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('topic', ['series' => $series->route, 'category' => $category->route, 'topic' => $topic->route]) }}">
                            {{ $topic->name }}
                        </a>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ $topic->description }}
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
