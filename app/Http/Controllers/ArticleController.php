<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\ArticlesRepositoryContract;
use App\Http\Requests\ArticleRequest;
use App\Http\Requests\TagSyncRequest;
use App\Models\Article;
use App\Services\ArticlesCud;
use App\Services\TagsSynchronizer;
use Carbon\Carbon;

class ArticleController extends Controller
{
    protected $articleRepository;
    protected $articleCud;

    public function __construct(ArticlesRepositoryContract $articleRepository, ArticlesCud $articleCud)
    {
        $this->articleCud = $articleCud;
        $this->articleRepository = $articleRepository;
    }

    public function index()
    {
        $articles = $this->articleRepository->pagination(5);
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
    public function store(ArticleRequest $request, TagSyncRequest $tagSyncRequest)
    {
        $articleData = $request->only(['title', 'description', 'body']);

        $articleData['published_at'] = $request->has('publish') ? Carbon::now()->toDateTimeString() : null;

        $this->articleCud->store($articleData, $tagSyncRequest->tagsCollection());

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
    public function update(Article $article, ArticleRequest $request, TagSyncRequest $tagSyncRequest)
    {
        $articleData = $request->only(['title', 'description', 'body']);

        $articleData['published_at'] = $request->has('publish') ? Carbon::now()->toDateTimeString() : null;

        $this->articleCud->update($articleData, $tagSyncRequest->tagsCollection(), $article);

        return redirect()->route('articles.edit', compact('article'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Article $article
     */
    public function destroy(Article $article)
    {
        if ($this->articleRepository->delete($article)) {
            session()->flash('success', 'Новость успешно удалена');
        } else {
            session()->flash('error', 'Не получилось удалить новость');
        }

        return redirect()->route('articles.index');
    }
}
