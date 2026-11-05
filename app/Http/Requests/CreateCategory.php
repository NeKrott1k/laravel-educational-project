<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCategory extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'name' => 'required|string|max:255|unique:products_categories'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Название обязательно к заполнению',
            'name.uniqie' => 'Категория с таким названием уже существует',
        ];
    }
}
