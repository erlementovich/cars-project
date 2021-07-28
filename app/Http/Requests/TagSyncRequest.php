<?php

namespace App\Http\Requests;

use App\Models\Tag;
use Illuminate\Foundation\Http\FormRequest;
use Ramsey\Collection\Collection;

class TagSyncRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return ['tags' => ''];
    }

    public function tagsCollection()
    {
        $tagsString = $this->validator->validated()['tags'];
        $tags = collect();

        if ($tagsString) {
            $tagsArr = explode(',', trim($tagsString));
            foreach ($tagsArr as $tagName) {
                $tagName = trim($tagName) ?? null;
                if ($tagName)
                    $tags->push(Tag::query()->firstOrCreate(['name' => $this->tagTrim($tagName)]));
            }
        }
        return $tags->unique();
    }

    public function tagTrim($tagName)
    {
        return trim($tagName);
    }

}
