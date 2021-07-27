<?php


namespace App\Services;


use App\Contracts\Interfaces\ArticlesRepositoryContract;
use App\Http\Requests\ArticleRequest;
use App\Http\Requests\TagSyncRequest;
use App\Models\Article;
use Kalnoy\Nestedset\Collection;

class ArticlesCud
{
    protected $articleRepository;
    protected $tagsSynchronizer;

    public function __construct(ArticlesRepositoryContract $articleRepository, TagsSynchronizer $tagsSynchronizer)
    {
        $this->articleRepository = $articleRepository;
        $this->tagsSynchronizer = $tagsSynchronizer;
    }

    public function update(array $articleData, $tagsCollection, Article $article)
    {
        if ($this->articleRepository->update($article, $articleData)) {
            session()->flash('success', 'Новость успешно обновлена');
            $this->tagsSynchronizer->sync($tagsCollection, $article);
        } else {
            session()->flash('error', 'Что-то пошло не так, не получилось обновить новость');
        }
    }

    public function store(array $articleData, $tagsCollection)
    {
        $article = $this->articleRepository->create($articleData);
        if ($article) {
            session()->flash('success', 'Новость успешно добавлена в базу');
            $this->tagsSynchronizer->sync($tagsCollection, $article);
        } else {
            session()->flash('error', 'Что-то пошло не так, не получилось создать новость');
        }
    }
}
