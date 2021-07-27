<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\ArticlesRepositoryContract;
use App\Contracts\Interfaces\CarsRepositoryContract;

class PageController extends Controller
{
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

    public function main(ArticlesRepositoryContract $articleRepository, CarsRepositoryContract $carRepository)
    {
        $articles = $articleRepository->latest();

        $weekProducts = $carRepository->week();

        return view('pages.homepage', compact('articles', 'weekProducts'));
    }

}
