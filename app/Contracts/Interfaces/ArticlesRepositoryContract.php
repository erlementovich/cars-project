<?php


namespace App\Contracts\Interfaces;


use App\Models\Article;

interface ArticlesRepositoryContract
{
    public function pagination(int $count = null);

    public function latest();

    public function create(array $data);

    public function update(array $data);

    public function delete();

    public function findBySlug(string $slug);

    public function tags();

    public function count();

    public function articleSortedByBody($direction = 'acs');

    public function mostTagged();
}
