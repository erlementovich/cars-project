<?php


namespace App\Contracts\Interfaces;


use App\Models\Category;

interface CategoriesRepositoryContract
{
    public function categoriesTree();

    public function pagination(Category $category, int $count = null);

    public function findBySlug(string $categorySlug);
}
