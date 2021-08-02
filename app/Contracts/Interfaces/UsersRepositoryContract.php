<?php


namespace App\Contracts\Interfaces;


interface UsersRepositoryContract
{
    public function find(int $id);

    public function findByEmail(string $email);
}
