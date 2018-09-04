@extends('layouts.app')

@if (isset($series))
    @include('layouts.sidebar.series', ['series' => $series])
@endif

@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('Author Dashboard') }}</div>

                <div class="card-body">
                    {{ __('Welcome, Author!') }}
                </div>
            </div>
        </div>
    </div>
@endsection
