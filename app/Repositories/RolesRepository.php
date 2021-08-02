<?php

namespace App\Repositories;

use App\Contracts\Interfaces\RolesRepositoryContract;
use App\Models\Role;

class RolesRepository implements RolesRepositoryContract
{
    protected $role;

    public function __construct(Role $role)
    {
        $this->role = $role;
    }


    public function create(string $name)
    {
        return $this->role->create(['name' => $name]);
    }

    public function delete(string $name)
    {
        return $this->role
            ->where('name', $name)
            ->first()
            ->delete();
    }

}
