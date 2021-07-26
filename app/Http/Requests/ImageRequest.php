<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImageRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'image' => 'image|mimes:jpeg,png,svg,jpg',
        ];
    }

    public function messages()
    {
        return [
            'image' => 'Загрузите изображение',
            'mimes' => 'Допустимые форматы картинок jpeg, jpg, svg, png',
        ];
    }
}
