<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class CarRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:5|max:100',
            'body' => 'required|min:5',
            'price' => 'required|integer|min:1',
            'old_price' => 'integer|min:1',
            'car_body_id' => 'integer|exists:car_bodies,id',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Данное поле обязательно для заполнения',
            'min' => 'Минимальное количество символов :min',
            'max' => 'Минимальное количество символов :max',
            'price.min' => 'Минимально допустимое значение :min',
            'old_price.min' => 'Минимально допустимое значение :min',
            'integer' => 'Введите целое число',
            'exists' => 'Не найдено записи с такими параметрами',
        ];
    }
}
