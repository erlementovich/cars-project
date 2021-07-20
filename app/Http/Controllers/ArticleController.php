<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::query()
            ->whereNotNull('published_at')
            ->orderByDesc('published_at')
            ->paginate(3);
        return view('pages.articles', compact('articles'));
    }


    public function create()
    {
        return view('pages.article-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function store(ArticleRequest $request)
    {
        $articleData = $request->only(['title', 'description', 'body']);

        if ($request->has('publish')) {
            $articleData['published_at'] = Carbon::now()->toDateTimeString();
        }

        $article = Article::create($articleData);

        if ($article) {
            session()->flash('success', 'Новость успешно добавлена в базу');
        } else {
            session()->flash('error', 'Что-то пошло не так, не получилось создать новость');
        }

        return redirect()->route('article-create');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Article $article
     */
    public function show(Article $article)
    {
        return view('pages.article', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Article $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Article $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Article $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
    }
}
