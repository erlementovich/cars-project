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
        return $this->salonClient->get('two_randoms');
    }

    public function all()
    {
        return $this->salonClient->get();
    }

}
