<?php


namespace App\Repositories;


use App\Contracts\Interfaces\CategoriesRepositoryContract;
use App\Models\Car;
use App\Models\Category;
use Illuminate\Support\Collection;

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
        $categories = $category->descendants()->pluck('id');
        $categories[] = $category->getKey();

        return Car::whereIn('category_id', $categories)->paginate($count);
    }
}
