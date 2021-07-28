<?php

namespace App\Services;

use App\Contracts\Interfaces\ArticlesRepositoryContract;
use App\Models\Article;

class ArticlesCreateUpdate
{
    protected $articleRepository;
    protected $tagsSynchronizer;
    protected $imageUploader;

    public function __construct(ArticlesRepositoryContract $articleRepository, TagsSynchronizer $tagsSynchronizer, ImageUploader $imageUploader)
    {
        $this->imageUploader = $imageUploader;
        $this->articleRepository = $articleRepository;
        $this->tagsSynchronizer = $tagsSynchronizer;
    }

    public function update(array $articleData, $tagsCollection, Article $article, $file)
    {
        $image = $this->imageUploader->saveFile($file);
        $articleData['image_id'] = $image->id;
        $updated = $this->articleRepository->update($article, $articleData);
        if ($updated)
            $this->tagsSynchronizer->sync($tagsCollection, $article);

        return $updated;
    }

    public function store(array $articleData, $tagsCollection, $file)
    {
        $image = $this->imageUploader->saveFile($file);
        $articleData['image_id'] = $image->id;

        $article = $this->articleRepository->create($articleData);
        if ($article)
            $this->tagsSynchronizer->sync($tagsCollection, $article);

        return $article;
    }
}
