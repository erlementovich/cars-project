<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Kalnoy\Nestedset\Collection;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('currentRoute', function ($route) {
            return Route::currentRouteNamed($route);
        });

        Blade::if('notCurrentRoute', function ($route) {
            return !Route::currentRouteNamed($route);
        });

        Blade::directive('money', function ($amount) {
            return "<?php echo number_format($amount, 0, '', ' ') . ' ₽'; ?>";
        });
    }
}
