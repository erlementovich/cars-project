<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\ArticlesRepositoryContract;
use App\Contracts\Interfaces\BannersRepositoryContract;
use App\Contracts\Interfaces\CarsRepositoryContract;

class PageController extends Controller
{
    protected $articleRepository;
    protected $carRepository;
    protected $bannerRepository;

    public function __construct(ArticlesRepositoryContract $articleRepository, CarsRepositoryContract $carRepository, BannersRepositoryContract $bannerRepository)
    {
        $this->bannerRepository = $bannerRepository;
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

        $banners = $this->bannerRepository->mainBanners();

        return view('pages.homepage', compact('articles', 'weekProducts', 'banners'));
    }

}
