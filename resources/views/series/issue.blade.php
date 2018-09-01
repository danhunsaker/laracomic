@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($issue->strips as $strip)
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('strip', ['series' => $series->route, 'volume' => $volume->number, 'issue' => $issue->number, 'strip' => $strip->number]) }}">
                            {{ $series->title }} – {{ title_case($issue->strip_name) }} {{ $strip->number }}: {{ $strip->title }}
                        </a>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ $strip->description }}
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
