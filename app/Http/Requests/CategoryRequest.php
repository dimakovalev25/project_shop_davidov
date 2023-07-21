<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules =  [
            'code' => 'required|min:2|unique:categories,code',
            'name' => 'required|min:2',
            'description' => 'required',
            'image' => 'required',
        ];

        if ($this->route()->named('categories.update')){
            $rules['code'] .= ','. $this->route()->parameter('category')->id ;
        }

        return $rules;
    }

    public function messages()
    {
        return [
          'required' => 'Field :attribute required!!'
        ];
    }
}
