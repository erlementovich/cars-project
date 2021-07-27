<?php


namespace App\Services;


use App\Contracts\Interfaces\ArticlesRepositoryContract;
use App\Models\Article;

class ArticlesCud
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

        if ($this->articleRepository->update($article, $articleData)) {
            session()->flash('success', 'Новость успешно обновлена');
            $this->tagsSynchronizer->sync($tagsCollection, $article);
        } else {
            session()->flash('error', 'Что-то пошло не так, не получилось обновить новость');
        }
    }

    public function store(array $articleData, $tagsCollection, $file = null)
    {
        $image = $this->imageUploader->saveFile($file);
        $articleData['image_id'] = $image->id;

        $article = $this->articleRepository->create($articleData);
        if ($article) {
            session()->flash('success', 'Новость успешно добавлена в базу');
            $this->tagsSynchronizer->sync($tagsCollection, $article);
        } else {
            session()->flash('error', 'Что-то пошло не так, не получилось создать новость');
        }
    }
}
