<?php

namespace App\Listeners;

use App\Contracts\Interfaces\UsersRepositoryContract;
use App\Events\ArticleUpdatedEvent;
use App\Notifications\ArticleUpdated;

class SendArticleUpdatedNotification
{
    protected $userRepository;

    public function __construct(UsersRepositoryContract $usersRepository)
    {
        $this->userRepository = $usersRepository;
    }

    /**
     * Handle the event.
     *
     * @param object $event
     * @return void
     */
    public function handle(ArticleUpdatedEvent $event)
    {
        $adminEmail = config('mail.to.admin');

        if ($adminEmail) {
            $admin = $this->userRepository->findByEmail($adminEmail);
            if ($admin)
                $admin->notify(new ArticleUpdated($event->article));
        }
    }
}
