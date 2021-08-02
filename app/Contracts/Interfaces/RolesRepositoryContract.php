<?php


namespace App\Contracts\Interfaces;


interface RolesRepositoryContract
{
    public function create(string $name);

    public function delete(string $name);
}
