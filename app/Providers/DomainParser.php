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
        $siteDomain = str_replace(['http://', 'https://'], '', config('app.url'));
        $rootDomain = app('Pdp\Rules')->resolve(Request::getHost())->getRegistrableDomain();

        config(['app.domain' => stripos(Request::getHost(), $siteDomain) >= 0 ? $siteDomain : $rootDomain]);
        config(['session.domain' => config('app.domain')]);
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
