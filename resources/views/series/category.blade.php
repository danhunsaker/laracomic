@extends('layouts.app')

@include('layouts.sidebar.series', ['series' => $series])

@section('content')
    @include('series.cards.category', ['series' => $series, 'category' => $category, 'single' => true, 'link' => false])
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                @if (! empty($category->parent))
                    @include('series.cards.category', ['series' => $series, 'category' => $category->parent, 'single' => true, 'link' => true])
                        @yield("category-card-{$category->parent->id}")
                    </div>

                    <ul>
                        <li class="row justify-content-center">
                            <div class="col">
                                <div class="card">
                                    @yield("category-card-{$category->id}")
                                </div>
                @else
                        @yield("category-card-{$category->id}")
                    </div>
                @endif

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

            @if (! empty($category->parent))
                        </div>
                    </li>
                </ul>
            @endif
        </div>
    </div>

    {{ ($pager = $category->topics()->latest()->paginate(5))->links() }}

    @foreach ($pager as $topic)
        @include('series.cards.topic', ['series' => $series, 'category' => $category, 'topic' => $topic, 'single' => false])
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    @yield("topic-card-{$topic->id}")
                </div>
            </div>
        </div>
    @endforeach

    {{ $pager->links() }}
@endsection
