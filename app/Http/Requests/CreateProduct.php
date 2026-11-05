<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProduct extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:1', 'max:99999999999.99'],
            'category' => ['required', 'integer', 'min:1'],
            'photo' => ['required', 'image', 'mimes:jpeg,png,gif,svg', 'max:2048'],
            'model' => ['required', 'string', 'max:100'],
            'release_year' => ['required', 'integer', 'max:9999'],
            'origin_country' => ['required', 'string', 'max:100'],
            'quantity_in_stock' => ['required', 'integer', 'max:100'],
        ];
    }
}
