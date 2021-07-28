<?php


namespace App\Repositories;


use App\Contracts\Interfaces\ImagesRepositoryContract;
use App\Models\Image;

class ImagesRepository implements ImagesRepositoryContract
{
    protected $image;

    /**
     * ImagesRepository constructor.
     * @param Image $image
     */
    public function __construct(Image $image)
    {
        $this->image = $image;
    }

    public function create(array $data)
    {
        return $this->image->query()->create($data);
    }

}
