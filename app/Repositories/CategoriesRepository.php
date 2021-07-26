<?php


namespace App\Repositories;


use App\Contracts\Interfaces\CategoriesRepositoryContract;
use App\Models\Category;

class CategoriesRepository implements CategoriesRepositoryContract
{
    protected $category;

    /**
     * CarsRepository constructor.
     * @param Category $category
     */
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function categoriesTree()
    {
        return $this->category->query()
            ->orderBy('sort')
            ->withDepth()
            ->having('depth', '<', 2)
            ->get()->toTree();
    }

    public function pagination(Category $category, $count = null)
    {
        return $category->cars()->paginate($count);
    }
}
