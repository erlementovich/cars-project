<?php

namespace App\Listeners;

use App\Contracts\Interfaces\UsersRepositoryContract;
use App\Events\ArticleCreatedEvent;
use App\Notifications\ArticleCreated;

class SendArticleCreatedNotification
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
    public function handle(ArticleCreatedEvent $event)
    {
        $adminEmail = config('mail.to.admin');

        if ($adminEmail) {
            $admin = $this->userRepository->findByEmail($adminEmail);
            if ($admin)
                $admin->notify(new ArticleCreated($event->article));
        }
    }
}
