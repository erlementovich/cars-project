<?php


namespace App\Services;


use App\Contracts\Interfaces\HasTags;
use Illuminate\Support\Collection;

class TagsSynchronizer
{
    public function sync(Collection $tags, HasTags $model)
    {
        $oldTags = $model->tags;

        $model->tags()->detach($this->getUnUsedTags($oldTags, $tags));

        $this->getNewTags($oldTags, $tags)->map(function ($tag) use ($model) {
            $model->tags()->save($tag);
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
