<?php


namespace App\Contracts\Interfaces;


interface ImagesRepositoryContract
{
    public function create(string $url, string $alt = null);
}
