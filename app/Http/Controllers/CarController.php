<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\CarsRepositoryContract;
use App\Models\Car;

class CarController extends Controller
{
    protected $carRepository;

    /**
     * CarController constructor.
     * @param CarsRepositoryContract $carRepository
     */
    public function __construct(CarsRepositoryContract $carRepository)
    {
        $this->carRepository = $carRepository;
    }


    public function index()
    {
        $products = $this->carRepository->pagination(16);
        return view('pages.product.index', compact('products'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Car $car
     */
    public function show($id)
    {
        $car = $this->carRepository->find($id);
        return view('pages.product.show', ['product' => $car]);
    }
}
