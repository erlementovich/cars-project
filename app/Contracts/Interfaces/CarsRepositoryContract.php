<?php


namespace App\Contracts\Interfaces;


use App\Models\Car;

interface CarsRepositoryContract
{
    public function pagination(int $count = null);

    public function week();
}
