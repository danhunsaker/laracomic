@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($series->categories as $category)
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('category', ['series' => $series->route, 'category' => $category->route]) }}">
                            {{ $category->name }}
                        </a>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ $category->description }}
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
