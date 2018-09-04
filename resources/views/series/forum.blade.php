@extends('layouts.app')

@include('layouts.sidebar.series', ['series' => $series])

@section('content')
    @foreach ($series->categories as $category)
        @continue(! empty($category->parent))
        @include('series.cards.category', ['series' => $series, 'category' => $category, 'single' => false])
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    @yield("category-card-{$category->id}")
                </div>

                @if ($category->children->count() > 0)
                    <ul>
                        @foreach ($category->children as $child)
                            @include('series.cards.category', ['series' => $series, 'category' => $child, 'single' => false])
                            <li class="row justify-content-center">
                                <div class="col">
                                    <div class="card">
                                        @yield("category-card-{$child->id}")
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    @endforeach
@endsection
