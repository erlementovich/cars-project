<?php

namespace App\Providers;

use App\Contracts\Interfaces\ArticlesRepositoryContract;
use App\Contracts\Interfaces\BannersRepositoryContract;
use App\Contracts\Interfaces\CarsRepositoryContract;
use App\Contracts\Interfaces\CategoriesRepositoryContract;
use App\Contracts\Interfaces\ImagesRepositoryContract;
use App\Contracts\Interfaces\TagsRepositoryContract;
use App\Contracts\Interfaces\UsersRepositoryContract;
use App\Repositories\ArticlesRepository;
use App\Repositories\BannersRepository;
use App\Repositories\CarsRepository;
use App\Repositories\CategoriesRepository;
use App\Repositories\ImagesRepository;
use App\Repositories\TagsRepository;
use App\Repositories\UsersRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->bind(
            CarsRepositoryContract::class,
            CarsRepository::class
        );

        $this->app->bind(
            ArticlesRepositoryContract::class,
            ArticlesRepository::class
        );

        $this->app->bind(
            TagsRepositoryContract::class,
            TagsRepository::class
        );

        $this->app->bind(
            CategoriesRepositoryContract::class,
            CategoriesRepository::class
        );

        $this->app->bind(
            ImagesRepositoryContract::class,
            ImagesRepository::class
        );

        $this->app->bind(
            BannersRepositoryContract::class,
            BannersRepository::class
        );

        $this->app->bind(
            UsersRepositoryContract::class,
            UsersRepository::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
