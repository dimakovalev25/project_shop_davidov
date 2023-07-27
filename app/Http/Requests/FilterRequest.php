<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'price_from'=> '',
            'category_id'=> '',
            'price_to'=> '',
            'hit'=> '',
            'new'=> '',
            'recommend'=> '',

        ];
    }
}
