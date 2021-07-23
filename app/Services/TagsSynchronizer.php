<?php


namespace App\Services;


use App\Contracts\Interfaces\HasTags;
use App\Contracts\Interfaces\TagsRepositoryContract;
use Illuminate\Support\Collection;

class TagsSynchronizer
{
    protected $tagsRepository;

    /**
     * TagsSynchronizer constructor.
     * @param TagsRepositoryContract $tagsRepository
     */
    public function __construct(TagsRepositoryContract $tagsRepository)
    {
        $this->tagsRepository = $tagsRepository;
    }


    public function sync(Collection $tags, HasTags $model)
    {
        $oldTags = $model->tags;
        $inputTags = $this->getInputTags($tags);
        $unUsedTags = $this->getUnUsedTags($oldTags, $inputTags);

        $model->tags()->detach($unUsedTags);

        $newTags = $this->getNewTags($oldTags, $inputTags);

        $newTags->map(function ($tag) use ($model) {
            $model->tags()->save($tag);
        });
    }

    public function getInputTags(Collection $tags)
    {
        return $tags->map(function ($tag) {
            return $this->tagsRepository->firstOrCreate(['name' => $tag]);
        });
    }

    public function getUnUsedTags($oldTags, $inputTags)
    {
        return $oldTags->filter(function ($tag) use ($inputTags) {
            return !$inputTags->contains('id', $tag->id);
        });
    }

    public function getNewTags($oldTags, $inputTags)
    {
        return $inputTags->filter(function ($tag) use ($oldTags) {
            return !$oldTags->contains('id', $tag->id);
        });
    }
}
