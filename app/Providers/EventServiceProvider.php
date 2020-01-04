<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use SocialiteProviders\Manager\SocialiteWasCalled;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        SocialiteWasCalled::class => [
            'SocialiteProviders\Deviantart\DeviantartExtendSocialite@handle',
            'SocialiteProviders\Discord\DiscordExtendSocialite@handle',
            'SocialiteProviders\Instagram\InstagramExtendSocialite@handle',
            'SocialiteProviders\Live\LiveExtendSocialite@handle',
            'SocialiteProviders\Patreon\PatreonExtendSocialite@handle',
            'SocialiteProviders\Pinterest\PinterestExtendSocialite@handle',
            'SocialiteProviders\Reddit\RedditExtendSocialite@handle',
            'SocialiteProviders\Tumblr\TumblrExtendSocialite@handle',
            'SocialiteProviders\Yahoo\YahooExtendSocialite@handle',
        ],
    ];

    /**
     * The subscriber classes to register.
     *
     * @var array
     */
    protected $subscribe = [
        'App\Listeners\UserEventSubscriber',
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
