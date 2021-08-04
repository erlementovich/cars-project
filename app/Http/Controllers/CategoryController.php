<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\CategoriesRepositoryContract;
use Illuminate\Support\Facades\Request;

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

    public function show($categorySlug)
    {
        $page = Request::input('page') ?? 1;
        $products = $this->categoryRepository->pagination($categorySlug, $page, 16);

        return view('pages.product.index', compact('products'));
    }
}
