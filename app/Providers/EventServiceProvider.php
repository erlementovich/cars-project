<?php

namespace App\Providers;

use App\Events\ArticleCreatedEvent;
use App\Events\ArticleDeletedEvent;
use App\Events\ArticleUpdatedEvent;
use App\Events\CarCreatedEvent;
use App\Events\CarDeletedEvent;
use App\Events\CarUpdatedEvent;
use App\Events\CategoryCreatedEvent;
use App\Events\CategoryDeletedEvent;
use App\Events\CategoryUpdatedEvent;
use App\Events\ModelCreatedEvent;
use App\Listeners\CacheArticlesFlush;
use App\Listeners\CacheCarsFlush;
use App\Listeners\CacheCategoriesFlush;
use App\Listeners\SendArticleCreatedNotification;
use App\Listeners\SendArticleDeletedNotification;
use App\Listeners\SendArticleUpdatedNotification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        ArticleUpdatedEvent::class => [
            SendArticleUpdatedNotification::class,
            CacheArticlesFlush::class,
        ],
        ArticleDeletedEvent::class => [
            SendArticleDeletedNotification::class,
            CacheArticlesFlush::class,
        ],
        ArticleCreatedEvent::class => [
            SendArticleCreatedNotification::class,
            CacheArticlesFlush::class,
        ],
        CarCreatedEvent::class => [
            CacheCarsFlush::class,
            CacheCategoriesFlush::class
        ],
        CarUpdatedEvent::class => [
            CacheCarsFlush::class,
            CacheCategoriesFlush::class
        ],
        CarDeletedEvent::class => [
            CacheCarsFlush::class,
            CacheCategoriesFlush::class
        ],
        CategoryCreatedEvent::class => [
            CacheCategoriesFlush::class
        ],
        CategoryUpdatedEvent::class => [
            CacheCategoriesFlush::class
        ],
        CategoryDeletedEvent::class => [
            CacheCategoriesFlush::class
        ],

    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
