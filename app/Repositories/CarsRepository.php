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

    public function find(int $id)
    {
        return $this->car
            ->with(['carBody', 'carClass', 'carEngine'])
            ->find($id);
    }


    public function pagination($count = null)
    {
        return $this->car
            ->with('image')
            ->paginate($count);
    }

    public function week()
    {
        return $this->car
            ->where('is_new', true)
            ->with('image')
            ->limit(4)
            ->get();
    }

    public function count()
    {
        return $this->car->count();
    }
}
