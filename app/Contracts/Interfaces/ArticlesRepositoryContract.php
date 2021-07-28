<?php


namespace App\Contracts\Interfaces;


use App\Models\Article;

interface ArticlesRepositoryContract
{
    public function pagination(int $count = null);

    public function latest();

    public function create(array $data);

    public function update(Article $article, array $data);

    public function delete(Article $article);

    public function tags();
}
