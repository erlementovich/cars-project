<?php

namespace App\Contracts\Interfaces;

interface CarsRepositoryContract
{
    public function pagination(int $count = null);

    public function all();

    public function week();

    public function find(int $id);

    public function findOrFail(int $id);

    public function count();

    public function delete(int $id);

    public function update(array $data, int $id);

    public function create(array $data);
}
