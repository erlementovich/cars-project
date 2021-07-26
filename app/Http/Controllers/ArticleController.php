<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\ArticlesRepositoryContract;
use App\Contracts\Interfaces\ImagesRepositoryContract;
use App\Http\Requests\ArticleRequest;
use App\Http\Requests\ImageRequest;
use App\Http\Requests\TagSyncRequest;
use App\Models\Article;
use App\Models\Image;
use App\Services\ImageUploader;
use App\Services\TagsSynchronizer;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    protected $articleRepository;
    protected $tagsSynchronizer;
    protected $imageUploader;

    public function __construct(
        ArticlesRepositoryContract $articleRepository,
        TagsSynchronizer $tagsSynchronizer,
        ImageUploader $imageUploader
    )
    {
        $this->articleRepository = $articleRepository;
        $this->tagsSynchronizer = $tagsSynchronizer;
        $this->imageUploader = $imageUploader;
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
    public function store(ArticleRequest $request, TagSyncRequest $tagSyncRequest, ImageRequest $imageRequest)
    {
        $articleData = $request->only(['title', 'description', 'body']);

        if ($request->has('publish')) {
            $articleData['published_at'] = Carbon::now()->toDateTimeString();
        }

        if ($imageRequest->hasFile('image')) {
            $file = $imageRequest->file('image');
            $imgUploaded = $this->imageUploader->saveFile($file);
            $articleData['image_id'] = $imgUploaded->id;
        }


        $article = $this->articleRepository->create($articleData);

        if ($article) {
            session()->flash('success', 'Новость успешно добавлена в базу');

            $tags = $tagSyncRequest->validated();
            $this->tagsSynchronizer->sync($tags, $article);

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
    public function update(ArticleRequest $request, Article $article, TagSyncRequest $tagSyncRequest, ImageRequest $imageRequest)
    {
        $articleData = $request->only(['title', 'description', 'body']);
        $articleData['published_at'] = $request->has('publish') ? Carbon::now()->toDateTimeString() : null;

        if ($imageRequest->hasFile('image')) {
            $file = $imageRequest->file('image');
            $imgUploaded = $this->imageUploader->saveFile($file);
            $articleData['image_id'] = $imgUploaded->id;
        }

        if ($this->articleRepository->update($article, $articleData)) {
            session()->flash('success', 'Новость успешно обновлена');
            $tags = $tagSyncRequest->validated();
            $this->tagsSynchronizer->sync($tags, $article);
        } else {
            session()->flash('error', 'Что - то пошло не так, не получилось обновить новость');
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
        if ($this->articleRepository->delete($article)) {
            session()->flash('success', 'Новость успешно удалена');
        } else {
            session()->flash('error', 'Не получилось удалить новость');
        }

        return redirect()->route('articles . index');
    }
}
