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

    public function create(string $path, string $alt = null)
    {
        $this->image->path = $path;
        $this->image->alt = $alt;
        $this->image->save();
        return $this->image;
    }

}
