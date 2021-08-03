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
        return $this->car->find($id);
    }

    public function findOrFail(int $id)
    {
        return $this->car->findOrFail($id);
    }


    public function pagination($count = null)
    {
        return $this->car
            ->with('image')
            ->paginate($count);
    }

    public function all()
    {
        return $this->car->get();
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

    public function delete(int $id)
    {
        $car = $this->findOrFail($id);
        return $car->delete();
    }

    public function update(array $data, int $id)
    {
        $car = $this->findOrFail($id);
        return $car->update($data);
    }

    public function create(array $data)
    {
        return $this->car->create($data);
    }
}
