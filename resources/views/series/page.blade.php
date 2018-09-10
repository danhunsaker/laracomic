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
@endsection
