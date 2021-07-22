<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $products = Car::query()->paginate(20);
        return view('pages.product.index', compact('products'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Car $car
     */
    public function show(Car $car)
    {
        return view('pages.product.show', ['product' => $car]);
    }
}
