<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EstoqueRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'tamanho' => 'required|max:3',
            'quantidadeDoEstoque' => 'required|integer',
            'produto_id' => 'required|integer'
        ];
    }

    public function messages(): array
    {
        return [
            'tamanho.required' => 'O tamanho da variação do produto é obrigatória!',
            'tamanho.max' => 'O tamanho da variação do produto deve ter no máximo 3 caracteres!',

            'quantidadeDoEstoque.required' => 'A quantidade do estoque é obrigatória!',
            'quantidadeDoEstoque.integer' => 'A quantidade do estoque deve ser um número inteiro!',

            'produto_id.required' => 'O id do produto é obrigatório!',
            'produto_id.integer' => 'O id do produto deve ser um número inteiro!',
        ];
    }
}
