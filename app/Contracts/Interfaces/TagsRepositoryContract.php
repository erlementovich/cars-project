<?php


namespace App\Contracts\Interfaces;


interface TagsRepositoryContract
{
    public function firstOrCreate(array $data);

    public function maxArticlesCountTag();

    public function avgArticlesCount();
}
