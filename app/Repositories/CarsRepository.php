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
                    ->find($id);
            });
    }


    public function pagination($count = null)
    {
        return $this->car
            ->with('image')
            ->paginate($count);
    }

    public function week()
    {
        return Cache::tags('cars')
            ->remember('week', 3600, function () {
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
            ->rememberForever('count', function () {
                return $this->car->count();
            });
    }
}
