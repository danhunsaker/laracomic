@if ($media->warnings()->count() > 0 || $media->spoilers()->count() > 0)
    <div class="card warnings">
        <div class="card-body">
            @if ($media->warnings()->count() > 0)
                @include('layouts.partials.content-warning', ['type' => $media->type, 'warnings' => $media->warnings()])
            @endif

            @if ($media->spoilers()->count() > 0)
                @include('layouts.partials.spoiler-warning', ['type' => $media->type, 'spoilers' => $media->spoilers()])
            @endif
        </div>
    </div>
@endif
<img{!! $attributeString !!} class="{{ $media->warnings()->count() > 0 ? ' warned' : '' }}{{ $media->spoilers()->count() > 0 ? ' spoiled' : '' }}" src="{{ $media->getUrl($conversion) }}">
