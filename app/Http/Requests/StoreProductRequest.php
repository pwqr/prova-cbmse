<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:1',
            'category_id' => 'required|exists:categories,id',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O nome do produto é obrigatório.',
            'name.max' => 'O nome do produto deve ter menos caracteres.',
            'price.required' => 'O preço do produto é obrigatório.',
            'price.numeric' => 'O preço precisa ser um número válido.',
            'quantity.required' => 'A quantidade é obrigatória.',
            'quantity.integer' => 'A quantidade deve ser um número.',
            'category_id.required' => 'É necessário selecionar uma categoria.',
            'category_id.exists' => 'A categoria selecionada não é válida.',
        ];
    }
}
