<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\ArticlesRepositoryContract;
use App\Http\Requests\ArticleRequest;
use App\Http\Requests\TagSyncRequest;
use App\Services\ArticlesCreateUpdate;
use Carbon\Carbon;

class ArticleController extends Controller
{
    protected $articleRepository;
    protected $articlesCreateUpdate;

    public function __construct(ArticlesRepositoryContract $articleRepository, ArticlesCreateUpdate $articlesCreateUpdate)
    {
        $this->articlesCreateUpdate = $articlesCreateUpdate;
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

    public function store(ArticleRequest $request, TagSyncRequest $tagSyncRequest)
    {
        $articleData = $request->only(['title', 'description', 'body']);
        $articleData['published_at'] = $request->has('publish') ? Carbon::now()->toDateTimeString() : null;
        $file = $request->file('image');

        $article = $this->articlesCreateUpdate->store($articleData, $tagSyncRequest->tagsCollection(), $file);

        if ($article) {
            session()->flash('success', 'Новость успешно добавлена в базу');
        } else {
            session()->flash('error', 'Что-то пошло не так, не получилось создать новость');
        }

        return redirect()->route('articles.create');
    }

    public function show($articleSlug)
    {
        $article = $this->articleRepository->findBySlug($articleSlug);
        return view('pages.article.show', compact('article'));
    }

    public function edit($articleSlug)
    {
        $article = $this->articleRepository->findBySlug($articleSlug);
        return view('pages.article.form', compact('article'));
    }

    public function update($articleSlug, ArticleRequest $request, TagSyncRequest $tagSyncRequest)
    {
        $articleData = $request->only(['title', 'description', 'body']);
        $articleData['published_at'] = $request->has('publish') ? Carbon::now()->toDateTimeString() : null;
        $file = $request->file('image');

        $article = $this->articleRepository->findBySlug($articleSlug);
        $updated = $this->articlesCreateUpdate->update($articleData, $tagSyncRequest->tagsCollection(), $article, $file);

        if ($updated) {
            session()->flash('success', 'Новость успешно обновлена');
        } else {
            session()->flash('error', 'Что-то пошло не так, не получилось обновить новость');
        }

        return redirect()->route('articles.edit', compact('article'));
    }

    public function destroy($articleSlug)
    {
        $article = $this->articleRepository->findBySlug($articleSlug);
        if ($article->delete()) {
            session()->flash('success', 'Новость успешно удалена');
        } else {
            session()->flash('error', 'Не получилось удалить новость');
        }

        return redirect()->route('articles.index');
    }
}
