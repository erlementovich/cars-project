<?php

namespace App\Repositories;

use App\Contracts\Interfaces\BannersRepositoryContract;
use App\Models\Banner;
use Illuminate\Support\Facades\Cache;

class BannersRepository implements BannersRepositoryContract
{
    protected $banner;

    /**
     * BannersRepository constructor.
     * @param Banner $banner
     */
    public function __construct(Banner $banner)
    {
        $this->banner = $banner;
    }


    public function create(array $data)
    {
        return $this->banner->create($data);
    }

    public function mainBanners()
    {
        return Cache::remember('banners', 3600, function () {
            return $this->banner
                ->inRandomOrder()
                ->limit(3)
                ->with('image')
                ->get();
        });
    }
}
