<?php

namespace App\Repositories;

use App\Contracts\Interfaces\TagsRepositoryContract;
use App\Models\Tag;

class TagsRepository implements TagsRepositoryContract
{
    protected $tag;

    /**
     * TagsRepository constructor.
     * @param Tag $tag
     */
    public function __construct(Tag $tag)
    {
        $this->tag = $tag;
    }

    public function firstOrCreate(array $data)
    {
        return $this->tag->firstOrCreate($data);
    }
}
