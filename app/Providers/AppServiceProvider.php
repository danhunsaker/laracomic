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
        require_once(app_path('helpers.php'));

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

        $app = $this->app;

        $app['blade.compiler']->directive('markdown', function($markdown) {
            if ($markdown) {
                return "<?php echo app('markdown')->convertToHtml({$markdown}); ?>";
            }

            return '<?php ob_start(); ?>';
        });

        $app['blade.compiler']->directive('endmarkdown', function () {
            return "<?php echo app('markdown')->convertToHtml(ob_get_clean()); ?>";
        });
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
