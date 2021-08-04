<?php

namespace App\Http\Controllers\Api\V1;

use App\Contracts\Interfaces\CarsRepositoryContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CarRequest;
use App\Http\Resources\V1\CarResource;
use App\Traits\ApiResponser;

class CarController extends Controller
{
    use ApiResponser;

    protected $carRepository;

    public function __construct(CarsRepositoryContract $carRepository)
    {
        $this->carRepository = $carRepository;
    }

    public function index()
    {
        $cars = CarResource::collection($this->carRepository->all());
        $cars->additional = ['success' => true];
        return $cars;
    }

    public function store(CarRequest $request)
    {
        $carData = $request->only(['name', 'body', 'price', 'old_price', 'car_body_id']);

        $createdCar = $this->carRepository->create($carData);

        if ($createdCar) {
            return $this->successResponse(['car_id' => $createdCar->id], 'Запись успешно создана');
        } else {
            return $this->errorResponse('Не получилось создать запись');
        }
    }

    public function show($id)
    {
        return CarResource::make($this->carRepository->findOrFail($id));
    }

    public function update(CarRequest $request, $id)
    {
        $carData = $request->only(['name', 'body', 'price', 'old_price', 'car_body_id']);
        $update = $this->carRepository->update($carData, $id);

        if ($update) {
            return $this->successResponse(['car_id' => $id], 'Запись успешно обновлена');
        } else {
            return $this->errorResponse('Не получилось обновить запись');
        }
    }

    public function destroy($id)
    {
        $carDeleted = $this->carRepository->delete($id);

        if ($carDeleted) {
            return $this->successResponse([], 'Запись успешно удалена из базы');
        } else {
            return $this->errorResponse('Не получилось удалить запись');
        }
    }
}
