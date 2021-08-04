<?php

namespace App\Providers;

use App\Services\SalonsClientService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(SalonsClientService::class, function () {
            $login = config('studentsapi.login');
            $password = config('studentsapi.password');
            $apiUrl = config('studentsapi.domain');

            return new SalonsClientService($login, $password, $apiUrl);
        });
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

        Blade::if('admin', function () {
            return Auth::check() && Auth::user()->isAdmin();
        });
    }
}
