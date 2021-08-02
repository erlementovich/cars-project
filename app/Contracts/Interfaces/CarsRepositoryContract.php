<?php


namespace App\Contracts\Interfaces;


use App\Models\Car;

interface CarsRepositoryContract
{
    public function pagination(int $count = null);

    public function week();

    public function find(int $id);

    public function count();
}
