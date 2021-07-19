<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $articles = Article::query()->latest('published_at')->limit(3)->get();

        return view('pages.homepage', compact('articles'));
    }
}
