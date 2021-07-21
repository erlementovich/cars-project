<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Car;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $articles = Article::query()
            ->whereNotNull('published_at')
            ->latest('published_at')
            ->limit(3)->get();

        $weekProducts = Car::week()->get();

        return view('pages.homepage', compact('articles', 'weekProducts'));
    }
}
