<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\SalonsRepositoryContract;

class SalonController extends Controller
{
    protected $salonRepository;

    /**
     * SalonController constructor.
     * @param SalonsRepositoryContract $salonRepository
     */
    public function __construct(SalonsRepositoryContract $salonRepository)
    {
        $this->salonRepository = $salonRepository;
    }

    public function all()
    {
        $salons = $this->salonRepository->all();
        return view('pages.salon.index', compact('salons'));
    }
}
