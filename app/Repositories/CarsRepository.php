<?php

namespace App\Repositories;

use App\Contracts\Interfaces\CarsRepositoryContract;
use App\Models\Car;
use App\Models\CarEngine;
use Illuminate\Support\Facades\Cache;

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
        return Cache::tags('cars')
            ->remember("car_$id", 3600, function () use ($id) {
                return $this->car
                    ->query()
                    ->with(['image', 'gallery', 'category'])
                    ->with(['carBody', 'carClass', 'carEngine'])
                    ->findOrFail($id);
            });
    }


    public function pagination($currentPage, $count = null)
    {
        return Cache::tags('cars')
            ->remember("cars_page_$currentPage", 3600, function () use ($count) {
                return $this->car
                    ->with('image')
                    ->paginate($count);
            });
    }

    public function all()
    {
        return Cache::tags('cars')->remember('allCars', 3600, function () {
            return $this->car->get();
        });
    }

    public function week()
    {
        return Cache::tags('cars')
            ->remember('weekCars', 3600, function () {
                return $this->car
                    ->where('is_new', true)
                    ->with('image')
                    ->limit(4)
                    ->get();
            });
    }

    public function count()
    {
        return Cache::tags('cars')
            ->remember('carsCount', 3600, function () {
                return $this->car->count();
            });
    }

    public function delete(int $id)
    {
        $car = $this->find($id);
        return $car->delete();
    }

    public function update(array $data, int $id)
    {
        $car = $this->find($id);
        return $car->update($data);
    }

    public function create(array $data)
    {
        return $this->car->create($data);
    }
}
