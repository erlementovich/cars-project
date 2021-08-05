<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\CarsRepositoryContract;
use App\Models\Car;
use Illuminate\Support\Facades\Request;

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
        $page = Request::input('page') ?? 1;
        $products = $this->carRepository->pagination($page, 16);
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
        if (!$car) {
            abort(404);
        }

        return view('pages.product.show', ['product' => $car]);
    }
}
