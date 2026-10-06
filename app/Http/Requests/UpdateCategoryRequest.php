<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'min:2',
                'max:100',

                Rule::unique('categories', 'name')
                    ->ignore($this->category),
            ],

            'description' => [
                'nullable',
                'string',
                'max:1000',
            ],
        ];
    }
}
