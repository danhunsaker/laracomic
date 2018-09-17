<div class="content-warning">
    <div class="m-auto">
        <h1>{{ __('WARNING! Sensitive Content!') }}</h1>
        <p>{{ __('This :type contains :warnings.', ['type' => $type, 'warnings' => list_implode($warnings->pluck('name'))]) }}</p>
        <button type="button" class="btn btn-warning dismiss-warning">{{ __('View Anyway') }}</button>
        <a role="button" tabindex="0" class="btn btn-link btn-sm text-info" data-toggle="popover" data-trigger="focus" title="{{ __('Content Warnings') }}" data-content="{{ __('laracomic.warning-explain') }}">{{ __('What Is This?') }}</a>
    </div>
</div>
