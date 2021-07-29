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
        return $this->article
            ->whereNotNull('published_at')
            ->orderByDesc('published_at')
            ->with(['tags', 'image'])
            ->paginate($count);
    }

    public function latest()
    {
        return $this->article
            ->whereNotNull('published_at')
            ->latest('published_at')
            ->with(['tags', 'image'])
            ->limit(3)
            ->get();
    }

    public function create(array $data)
    {
        return $this->article->create($data);
    }

    public function update(array $data)
    {
        return $this->article->update($data);
    }

    public function delete()
    {
        return $this->article->delete();
    }

    public function findBySlug(string $slug)
    {
        return $this->article->where('slug', $slug)->first();
    }


    public function tags()
    {
        return $this->article->tags();
    }
}
