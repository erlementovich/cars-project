<?php


namespace App\Contracts\Interfaces;


interface ImagesRepositoryContract
{
    public function create(string $path, string $alt = null);
}
