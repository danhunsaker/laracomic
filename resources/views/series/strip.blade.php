@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ $series->title }} – {{ title_case($strip->issue->strip_name) }} {{ $strip->number }}: {{ $strip->title }}
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="strip-image">
                        <img src="" alt="{{ $strip->description }}">
                    </div>

                    <p>
                        {{ $strip->commentary }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
