<?php

namespace App\Repositories;

use App\Contracts\Interfaces\ArticlesRepositoryContract;
use App\Models\Article;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

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

    public function pagination($currentPage, int $count = null)
    {
        return Cache::tags('articles')
            ->remember("pagination_page_$currentPage", 3600, function () use ($count) {
                return $this->article
                    ->whereNotNull('published_at')
                    ->orderByDesc('published_at')
                    ->with(['tags', 'image'])
                    ->paginate($count);
            });
    }

    public function latest()
    {
        return Cache::tags('articles')
            ->remember('latest', 3600, function () {
                return $this->article
                    ->whereNotNull('published_at')
                    ->latest('published_at')
                    ->with(['tags', 'image'])
                    ->limit(3)
                    ->get();
            });
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
        return Cache::tags('articles')
            ->remember("article_$slug", 3600, function () use ($slug) {
                return $this->article
                    ->where('slug', $slug)
                    ->with(['tags', 'image'])
                    ->first();
            });
    }


    public function tags()
    {
        return $this->article->tags();
    }

    public function count()
    {
        return Cache::tags('articles')
            ->remember('articlesCount', 3600, function () {
                return $this->article->count();
            });
    }

    public function articleSortedByBody($direction = 'asc')
    {
        return $this->article
            ->query()
            ->select(['title', 'id', DB::raw('CHAR_LENGTH(body) as body_length')])
            ->orderBy('body_length', $direction)
            ->first();
    }

    public function mostTagged()
    {
        return $this->article
            ->select(['title', 'id'])
            ->withCount('tags')
            ->orderByDesc('tags_count')
            ->first();
    }
}
