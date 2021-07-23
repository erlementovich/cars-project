<?php


namespace App\Repositories;

use App\Contracts\Interfaces\ArticlesRepositoryContract;
use App\Contracts\Interfaces\HasTags;
use App\Models\Article;
use Illuminate\Database\Eloquent\Model;

class ArticlesRepository implements ArticlesRepositoryContract
{
    protected $article;

    /**
     * ArticlesRepository constructor.
     * @param Article $article
     */

    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    public function pagination(int $count = null)
    {
        return $this->article->query()
            ->whereNotNull('published_at')
            ->orderByDesc('published_at')
            ->paginate(5);
    }

    public function latest()
    {
        return $this->article->query()
            ->whereNotNull('published_at')
            ->latest('published_at')
            ->limit(3)->get();
    }

    public function create(array $data)
    {
        return $this->article->query()->create($data);
    }

    public function update(Article $article, array $data)
    {
        return $article->update($data);
    }

    public function delete(Article $article)
    {
        return $article->delete();
    }

    public function tags()
    {
        return $this->article->tags();
    }
}
