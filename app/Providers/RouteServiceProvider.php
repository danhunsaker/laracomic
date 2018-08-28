<?php

namespace App\Providers;

use App;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        Route::bind('series', function ($route) {
            $series = \App\Series::where('route', $route)->first();

            Route::bind('volume', function ($number) use ($series) {
                $volume = \App\Volume::where([
                    'series_id' => $series->id,
                    'number' => $number,
                ])->first();

                Route::bind('issue', function ($number) use ($volume) {
                    $issue = \App\Issue::where([
                        'volume_id' => $volume->id,
                        'number' => $number,
                    ])->first();

                    Route::bind('strip', function ($number) use ($issue) {
                        return \App\Strip::where([
                            'issue_id' => $issue->id,
                            'number' => $number,
                        ])->first();
                    });

                    return $issue;
                });

                return $volume;
            });

            Route::bind('page', function ($route) use ($series) {
                return \App\Page::where([
                    'series_id' => $series->id,
                    'route' => $route
                ])->first();
            });

            Route::bind('category', function ($route) use ($series) {
                $category = \App\Category::where([
                    'series_id' => $series->id,
                    'route' => $route
                ])->first();

                Route::bind('topic', function ($route) use ($category) {
                    return \App\Topic::where([
                        'category_id' => $category->id,
                        'route' => $route,
                    ])->first();
                });

                return $category;
            });

            return $series;
        });

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}
