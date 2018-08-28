@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($series->volumes as $volume)
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('volume', ['series' => $series->route, 'volume' => $volume->number]) }}">
                            {{ $series->title }} – {{ title_case($series->volume_name) }} {{ $volume->number }}: {{ $volume->title }}
                        </a>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ $volume->description }}
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
