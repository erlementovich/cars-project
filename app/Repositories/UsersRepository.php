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

    public function create(array $data)
    {
        return $this->user->create($data);
    }

    public function deleteByEmail(string $email)
    {
        return $this->findByEmail($email)->delete();
    }


}
