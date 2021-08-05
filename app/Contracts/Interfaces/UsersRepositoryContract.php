<?php


namespace App\Contracts\Interfaces;


interface UsersRepositoryContract
{
    public function find(int $id);

    public function findByEmail(string $email);

    public function create(array $data);

    public function deleteByEmail(string $email);
}
