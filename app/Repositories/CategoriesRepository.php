<?php

namespace App\Repositories;

use App\Contracts\Interfaces\CategoriesRepositoryContract;
use App\Models\Car;
use App\Models\Category;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

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
        return Cache::tags('categories')->remember('categoriesTree', 3600, function () {
            return $this->category
                ->orderBy('sort')
                ->withDepth()
                ->having('depth', '<', 2)
                ->get()
                ->toTree();
        });
    }

    public function pagination($categorySlug, $currentPage, $count = null)
    {
        $category = $this->findBySlug($categorySlug);
        return Cache::tags('categories')
            ->remember("category_$categorySlug" . "_$currentPage", 3600, function () use ($category, $count) {
                $categories = $category->descendants()->pluck('id');
                $categories[] = $category->getKey();

                return $this->car
                    ->whereIn('category_id', $categories)
                    ->with('image')
                    ->paginate($count);
            });
    }


    public function findBySlug(string $categorySlug)
    {
        return Cache::tags('categories')
            ->remember("category_$categorySlug", 3600, function () use ($categorySlug) {
                return $this->category
                    ->where('slug', $categorySlug)
                    ->first();
            });
    }
}
