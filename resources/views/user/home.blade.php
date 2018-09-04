@extends('layouts.app')

@if (isset($series))
    @include('layouts.sidebar.series', ['series' => $series])
@endif

@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('User Dashboard') }}</div>

                <div class="card-body">
                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
@endsection
