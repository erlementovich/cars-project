<?php

namespace App\Repositories;

use App\Contracts\Interfaces\SalonsRepositoryContract;
use App\Services\SalonsClientService;
use Illuminate\Support\Facades\Cache;

class SalonsRepository implements SalonsRepositoryContract
{
    protected $salonClient;

    /**
     * SalonsRepository constructor.
     * @param SalonsClientService $salonClient
     */
    public function __construct(SalonsClientService $salonClient)
    {
        $this->salonClient = $salonClient;
    }

    public function twoRandom()
    {
        return Cache::remember('twoRandomSalons', 300, function () {
            return $this->salonClient->get('two_randoms');
        });
    }

    public function all()
    {
        return Cache::remember('allSalons', 3600, function () {
            return $this->salonClient->get();
        });
    }

}
