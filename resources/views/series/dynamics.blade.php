@section('banner')
    @if (! is_null($media = $current->image('banner')))
        {!! $media('banner_site', ['alt' => __('Banner for :title', ['title' => $series->title]), 'title' => $series->title, 'width' => '100%']) !!}
    @endif
@endsection

@section('logo')
    @if (! is_null($media = $current->image('logo')))
        {!! $media('logo_site', ['alt' => __('Logo for :title', ['title' => $series->title]), 'width' => '100%']) !!}
    @else
        {{ $series->title }}
    @endif
@endsection

@section('favicon')
    @if (! is_null($media = $current->image('logo')))
        <link rel="icon" href="{{ $media->getFullUrl('logo_favicon') }}">
    @endif
@endsection
