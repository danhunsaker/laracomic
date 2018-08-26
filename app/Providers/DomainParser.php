<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Pdp\Cache;
use Pdp\CurlHttpClient;
use Pdp\Manager;
use Pdp\Rules;
use Request;

class DomainParser extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        config(['app.domain' => app('Pdp\Rules')->resolve(Request::getHost())->getRegistrableDomain() ?:
                                str_replace(['http://', 'https://'], '', config('app.url'))]);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Rules::class, function ($app) {
            return (new Manager(new Cache(), new CurlHttpClient()))->getRules();
        });
    }
}
