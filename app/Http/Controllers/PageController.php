<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\ArticlesRepositoryContract;
use App\Contracts\Interfaces\CarsRepositoryContract;

class PageController extends Controller
{
    protected $articleRepository;
    protected $carRepository;

    /**
     * MainController constructor.
     * @param ArticlesRepositoryContract $articleRepository
     * @param CarsRepositoryContract $carRepository
     */
    public function __construct(ArticlesRepositoryContract $articleRepository, CarsRepositoryContract $carRepository)
    {
        $this->articleRepository = $articleRepository;
        $this->carRepository = $carRepository;
    }

    public function contacts()
    {
        return view('pages.contacts');
    }

    public function financial()
    {
        return view('pages.financial-department');
    }

    public function about()
    {
        return view('pages.about');
    }

    public function sales()
    {
        return view('pages.sales');
    }

    public function clients()
    {
        return view('pages.clients');
    }

    public function main()
    {
        $articles = $this->articleRepository->latest();

        $weekProducts = $this->carRepository->week();

        return view('pages.homepage', compact('articles', 'weekProducts'));
    }

}
