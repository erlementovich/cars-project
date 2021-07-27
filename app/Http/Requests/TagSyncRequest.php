<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
        $tagsArr = collect(explode(',', trim($tagsString)));
        $tags = $tagsArr->filter(function ($tag) {
            return trim($tag);
        });

        return $tags->transform(function ($tag) {
            return trim($tag);
        })->unique();
    }

}
