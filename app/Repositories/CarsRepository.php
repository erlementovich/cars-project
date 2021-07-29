<?php


namespace App\Repositories;

use App\Contracts\Interfaces\CarsRepositoryContract;
use App\Models\Car;
use App\Models\CarEngine;

class CarsRepository implements CarsRepositoryContract
{
    protected $car;

    /**
     * CarsRepository constructor.
     * @param Car $car
     */
    public function __construct(Car $car)
    {
        $this->car = $car;
    }


    public function pagination($count = null)
    {
        return $this->car->query()->with('image')->paginate($count);
    }

    public function week()
    {
        return $this->car->query()
            ->where('is_new', true)
            ->with('image')
            ->limit(4)->get();
    }
}
