<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::query()
            ->whereNotNull('published_at')
            ->orderByDesc('published_at')
            ->paginate(3);
        return view('pages.article.index', compact('articles'));
    }


    public function create()
    {
        return view('pages.article.form');
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

        return redirect()->route('articles.create');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Article $article
     */
    public function show(Article $article)
    {
        return view('pages.article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Article $article
     */
    public function edit(Article $article)
    {
        return view('pages.article.form', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Article $article
     */
    public function update(ArticleRequest $request, Article $article)
    {
        $articleData = $request->only(['title', 'description', 'body']);

        $articleData['published_at'] = $request->has('publish') ? Carbon::now()->toDateTimeString() : null;

        if ($article->update($articleData)) {
            session()->flash('success', 'Новость успешно обновлена');
        } else {
            session()->flash('error', 'Что-то пошло не так, не получилось обновить новость');
        }

        return redirect()->route('articles.edit', compact('article'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Article $article
     */
    public function destroy(Article $article)
    {
        if ($article->delete()) {
            session()->flash('success', 'Новость успешно удалена');
        } else {
            session()->flash('error', 'Не получилось удалить новость');
        }

        return redirect()->route('articles.index');
    }
}
