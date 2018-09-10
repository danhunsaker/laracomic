@extends('layouts.app')

@include('layouts.sidebar.series', ['series' => $series])

@section('content')
    @include('series.cards.post', ['series' => $series, 'category' => $category, 'topic' => $topic, 'post' => $post, 'single' => true])
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                @yield("post-card-{$post->id}")
            </div>

            @if ($post->children->count() > 0)
                <ul>
                    @foreach ($post->children as $child)
                        @include('series.cards.post', ['series' => $series, 'category' => $category, 'topic' => $topic, 'post' => $child, 'single' => false])
                        <li class="row justify-content-center">
                            <div class="col">
                                <div class="card">
                                    @yield("post-card-{$child->id}")
                                </div>
                            </div>
                            @if ($child->children->count() > 0)
                                <ul>
                                    <li class="row justify-content-center">
                                        <div class="col">
                                            <div class="card">
                                                <div class="card-header">
                                                    {{ trans_choice('{1} :value more post...|[2,*] :value more posts...', $child->children->count(), ['value' => $child->children->count()]) }}
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            @endif
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
@endsection
