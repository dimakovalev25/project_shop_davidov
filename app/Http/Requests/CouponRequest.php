<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CouponRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules =  [
            'code' => '',
            'value' => '',
            'type' => '',
            'only_once' => '',
            'expired_at' => '',
            'currency_id' => '',
            'description' => '',
        ];

        return $rules;
    }

    public function messages()
    {
        return [
          'required' => 'Field :attribute required!!'
        ];
    }
}
