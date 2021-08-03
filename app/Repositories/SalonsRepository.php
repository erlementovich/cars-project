<?php

namespace App\Repositories;

use App\Contracts\Interfaces\SalonsRepositoryContract;
use App\Services\SalonsClientService;

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
        $response = $this->salonClient->get('two_randoms');
        return $response->collect();
    }

    public function all()
    {
        $response = $this->salonClient->get();
        return $response->collect();
    }

}
