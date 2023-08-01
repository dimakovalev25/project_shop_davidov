<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddCouponRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules =  [
            'coupon' => 'required|string|max:8|exists:coupons,code',
        ];

        return $rules;
    }

    public function messages()
    {
        return [
          'coupon.*' => 'this coupon does not exist!'
        ];
    }
}
