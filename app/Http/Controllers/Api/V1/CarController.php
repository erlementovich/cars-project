<?php

namespace App\Http\Controllers\Api\V1;

use App\Contracts\Interfaces\CarsRepositoryContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CarRequest;
use App\Http\Resources\V1\CarResource;

class CarController extends Controller
{
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
            return response()->json(['success' => true, 'car_id' => $createdCar->id]);
        } else {
            return response()->json(['success' => false, 'errors' => 'Не получилось создать объект']);
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
            return response()->json(['success' => true, 'car_id' => $id]);
        } else {
            return response()->json(['success' => false, 'errors' => 'Не получилось обновить запись']);
        }
    }

    public function destroy($id)
    {
        $car = $this->carRepository->delete($id);

        if ($car) {
            return response()->json(['success' => true, 'message' => 'Запись успешно удалена из базы']);
        } else {
            return response()->json(['success' => false, 'message' => 'Не получилось удалить запись']);
        }
    }
}
