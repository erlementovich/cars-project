<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\CategoriesRepositoryContract;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryRepository;

    /**
     * CategoryController constructor.
     * @param CategoriesRepositoryContract $categoryRepository
     */
    public function __construct(CategoriesRepositoryContract $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function show(Category $category)
    {
        $products = $this->categoryRepository->pagination($category, 16);

        return view('pages.product.index', compact('products'));
    }
}
