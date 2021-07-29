<?php


namespace App\Repositories;


use App\Contracts\Interfaces\BannersRepositoryContract;
use App\Models\Banner;

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
        return $this->banner->query()->create($data);
    }

    public function mainBanners()
    {
        return $this->banner->query()->inRandomOrder()->limit(3)->with('image')->get();
    }
}