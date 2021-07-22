<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Car;
use Illuminate\Http\Request;

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

    public function main()
    {
        $articles = Article::query()
            ->whereNotNull('published_at')
            ->latest('published_at')
            ->limit(3)->get();

        $weekProducts = Car::week()->limit(4)->get();

        return view('pages.homepage', compact('articles', 'weekProducts'));
    }

}
