<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|unique:categories,name',
            'description' => 'nullable|string|max:500',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O nome da categoria é obrigatório.',
            'name.string' => 'O nome deve conter apenas texto.',
            'name.max' => 'O nome deve conter menos caracteres.',
            'name.unique' => 'Essa categoria já está cadastrada.',
            'description.string' => 'A descrição deve conter apenas letras.',
            'description.max' => 'A descrição deve ter menos caracteres.',
        ];
    }
}
