<?php


namespace App\Contracts\Interfaces;


use App\Models\Category;

interface CategoriesRepositoryContract
{
    public function categoriesTree();

    public function pagination($categorySlug, $currentPage, int $count = null);

    public function findBySlug(string $categorySlug);
}
