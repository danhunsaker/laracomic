<?php

namespace App\Providers;

use App;
use Request;
use App\Series;
use Illuminate\Support\ServiceProvider;

class LoadFeeds extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if (! app('migrator')->repositoryExists()) return;

        if (! is_null($custom = \App\CustomDomain::where(['domain' => Request::getHost()])->first())) {
            $this->addSeriesFeeds($custom->series);
        } elseif (Request::getHost() != config('app.domain')) {
            $this->addSeriesFeeds(Series::where([
                'route' => str_replace('.'.config('app.domain'), '', Request::getHost())
            ])->first());
        } else {
            Series::currentStatus('public')->each(function (Series $series) {
                $this->addSeriesFeeds($series, "/{$series->route}");
            });
        }
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    protected function addSeriesFeeds(?Series $series = null, string $route = '')
    {
        if (is_null($series)) return;

        config([
            "feed.feeds.{$series->route}:series" => [
                'items' => [[$series, 'getFeed']],
                'url' => "{$route}/feed",
                'title' => $series->title,
            ],
        ]);
        config([
            "feed.feeds.{$series->route}:news" => [
                'items' => ['App\News@getFeed', $series],
                'url' => "{$route}/news/feed",
                'title' => "{$series->title} News",
            ],
        ]);
    }
}
