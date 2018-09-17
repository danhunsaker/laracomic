<div class="spoiler-warning">
    <div class="m-auto">
        <h1>{{ __('SPOILERS!') }}</h1>
        <p>{{ __('This :type has spoilers for :spoilers.', ['type' => $type, 'spoilers' => list_implode($spoilers->pluck('name'))]) }}</p>
        <button type="button" class="btn btn-warning dismiss-spoiler">{{ __('View Anyway') }}</button>
        <a role="button" tabindex="0" class="btn btn-link btn-sm text-info" data-toggle="popover" data-trigger="focus" title="{{ __('Spoiler Warnings') }}" data-content="{{ __('laracomic.spoiler-explain') }}">{{ __('What Is This?') }}</a>
    </div>
</div>
