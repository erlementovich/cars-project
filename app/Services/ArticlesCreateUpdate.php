<?php

namespace App\Services;

use App\Contracts\Interfaces\ArticlesRepositoryContract;
use App\Models\Article;

class ArticlesCreateUpdate
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
        $updated = $this->articleRepository->update($article, $articleData);
        if ($updated)
            $this->tagsSynchronizer->sync($tagsCollection, $article);

        return $updated;
    }

    public function store(array $articleData, $tagsCollection)
    {
        $article = $this->articleRepository->create($articleData);
        if ($article)
            $this->tagsSynchronizer->sync($tagsCollection, $article);

        return $article;
    }
}
