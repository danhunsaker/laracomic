@extends('layouts.app')

@section('content')
@if ($volume->issues->count() == 1)
    @include('series.issue', ['series' => $series, 'volume' => $volume, 'issue' => $volume->issues->first()])
@else
    <div class="container">
        @foreach ($volume->issues as $issue)
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('issue', ['series' => $series->route, 'volume' => $volume->number, 'issue' => $issue->number]) }}">
                                {{ $series->title }} – {{ title_case($volume->issue_name) }} {{ $issue->number }}: {{ $issue->title }}
                            </a>
                        </div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            {{ $issue->description }}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif
@endsection
