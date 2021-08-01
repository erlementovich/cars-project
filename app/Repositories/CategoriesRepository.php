<?php

namespace App\Repositories;

use App\Contracts\Interfaces\CategoriesRepositoryContract;
use App\Models\Car;
use App\Models\Category;
use Illuminate\Support\Collection;

class CategoriesRepository implements CategoriesRepositoryContract
{
    protected $category;
    protected $car;

    /**
     * CategoriesRepository constructor.
     * @param Category $category
     * @param Car $car
     */
    public function __construct(Category $category, Car $car)
    {
        $this->category = $category;
        $this->car = $car;
    }


    public function categoriesTree()
    {
        return $this->category
            ->orderBy('sort')
            ->withDepth()
            ->having('depth', '<', 2)
            ->get()
            ->toTree();
    }

    public function pagination(Category $category, $count = null)
    {
        $categories = $category->descendants()->pluck('id');
        $categories[] = $category->getKey();

        return $this->car
            ->whereIn('category_id', $categories)
            ->paginate($count);
    }


    public function findBySlug(string $categorySlug)
    {
        return $this->category
            ->where('slug', $categorySlug)
            ->first();
    }
}
