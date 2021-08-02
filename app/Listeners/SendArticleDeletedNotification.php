<?php

namespace App\Listeners;

use App\Contracts\Interfaces\UsersRepositoryContract;
use App\Events\ArticleDeletedEvent;
use App\Notifications\ArticleDeleted;

class SendArticleDeletedNotification
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
    public function handle(ArticleDeletedEvent $event)
    {
        $adminEmail = config('mail.to.admin');

        if ($adminEmail) {
            $admin = $this->userRepository->findByEmail($adminEmail);
            if ($admin)
                $admin->notify(new ArticleDeleted($event->article));
        }
    }
}
