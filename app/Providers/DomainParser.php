<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Pdp\Cache;
use Pdp\CurlHttpClient;
use Pdp\Manager;
use Pdp\Rules;

class DomainParser extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
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
