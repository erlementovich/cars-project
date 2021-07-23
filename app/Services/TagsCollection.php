<?php


namespace App\Services;


use App\Contracts\Interfaces\TagsRepositoryContract;

class TagsCollection
{
    protected $tagsRepositoryContract;

    /**
     * TagsCollection constructor.
     * @param TagsRepositoryContract $tagsRepositoryContract
     */
    public function __construct(TagsRepositoryContract $tagsRepositoryContract)
    {
        $this->tagsRepositoryContract = $tagsRepositoryContract;
    }

    public function getTagsString($tagsData)
    {
        return $tagsData['tags'];
    }

    public function tagsCollection($validated)
    {
        $tagsString = $this->getTagsString($validated);
        $tags = collect();

        if ($tagsString) {
            $tagsArr = $this->tagsArray($tagsString);

            foreach ($tagsArr as $tagName) {
                $tagData = $this->tagData($tagName);

                if ($tagData)
                    $tags->push($this->tagsRepositoryContract->firstOrCreate($tagData));

            }
        }

        return $tags->unique();
    }

    public function tagData($tagName)
    {
        $trimmed = trim($tagName);
        return $trimmed ? ['name' => $trimmed] : null;
    }

    public function tagsArray($string)
    {
        return explode(',', trim($string));
    }
}
