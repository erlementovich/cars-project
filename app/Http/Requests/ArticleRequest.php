<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class ArticleRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:5|max:100',
            'description' => 'required|min:5|max:255',
            'body' => 'required|min:5',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Это поле обязательно для заполнения',
            'min' => 'Минимальное количество симолов :min',
            'max' => 'Максимальное количество символов :max',
            'unique' => 'Такое название уже используется',
        ];
    }
}
