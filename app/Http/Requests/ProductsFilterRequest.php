<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductsFilterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'price_from' => 'nullable|numeric|min:0',
            'price_to' => 'nullable|numeric|min:0|max:80000'
        ];
    }
}
