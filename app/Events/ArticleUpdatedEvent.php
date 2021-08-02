<?php

namespace App\Events;

use App\Models\Article;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ArticleUpdatedEvent
{
    use Dispatchable, SerializesModels;

    public $article;

    /**
     * ArticleUpdatedEvent constructor.
     * @param Article $article
     */
    public function __construct(Article $article)
    {
        $this->article = $article;
    }

}
