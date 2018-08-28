@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($series->news as $news)
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('article', ['series' => $series->route, 'news' => $news]) }}">
                            {{ $news->headline }}
                        </a>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ $news->article }}
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
