<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules =  [
            'name_en' => 'required',
            'name' => 'required',

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
