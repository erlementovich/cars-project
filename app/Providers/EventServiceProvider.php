<?php

namespace App\Providers;

use App\Events\ArticleCreatedEvent;
use App\Events\ArticleDeletedEvent;
use App\Events\ArticleUpdatedEvent;
use App\Listeners\SendArticleCreatedNotification;
use App\Listeners\SendArticleDeletedNotification;
use App\Listeners\SendArticleUpdatedNotification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

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
            SendArticleUpdatedNotification::class
        ],
        ArticleDeletedEvent::class => [
            SendArticleDeletedNotification::class
        ],
        ArticleCreatedEvent::class => [
            SendArticleCreatedNotification::class
        ]
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
