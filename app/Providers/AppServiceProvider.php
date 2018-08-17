<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Relation::morphMap([
            'user'      => 'App\User',
            'role'      => 'App\Role',
            'authority' => 'App\Authority',
            'series'    => 'App\Series',
            'volume'    => 'App\Volume',
            'issue'     => 'App\Issue',
            'strip'     => 'App\Strip',
            'page'      => 'App\Page',
            'news'      => 'App\News',
            'comment'   => 'App\Comment',
            'category'  => 'App\Category',
            'topic'     => 'App\Topic',
            'post'      => 'App\Post',
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
