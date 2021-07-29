<?php

namespace App\Providers;

use App\Contracts\Interfaces\CategoriesRepositoryContract;
use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('layouts.app', function ($view) {
            $categoryRepository = $this->app->make(CategoriesRepositoryContract::class);
            $categories = $categoryRepository->categoriesTree();
            $view->with('categories', $categories);
        });

    }
}
