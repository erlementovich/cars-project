<?php

namespace App\Repositories;

use App\Contracts\Interfaces\UsersRepositoryContract;
use App\Models\User;

class UsersRepository implements UsersRepositoryContract
{
    protected $user;

    /**
     * UsersRepository constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function find(int $id)
    {
        return $this->user->find($id);
    }

    public function findByEmail(string $email)
    {
        return $this->user->where('email', $email)->first();
    }

}
