<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoRequest extends FormRequest
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
            'nome' => 'required|max:32',
            'cor' => 'required|max:16',
            'imagem' => 'required',
            'preco' => 'required|decimal:0,2',
            'descricao' => 'required|max:128',
            'peso' => 'required|decimal:0,3',
            'categoria_id' => 'required|integer',
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'O nome do produto é obrigatório!',
            'nome.max' => 'O nome do produto deve ter no máximo 32 caracteres!',

            'cor.required' => 'O nome da cor é obrigatório!',
            'cor.max' => 'O tamanho máximo para o nome da cor é 16 caracteres!',

            'imagem.required' => 'A imagem do produto é obrigatória!',

            'preco.required' => 'O preço do produto é obrigatório!',
            'preco.decimal' => 'O preço deve ser um número!',

            'descricao.required' => 'A descrição do produto é obrigatória!',
            'descricao.max' => 'O tamanho máximo para a descrição do produto é 128 caracteres!',

            'peso.required' => 'O peso do produto é obrigatório!',
            'peso.decimal' => 'O peso deve ser um número!',

            'categoria_id.required' => 'O id da categoria é obrigatório!',
            'categoria_id.integer' => 'O id da categoria deve ser um número inteiro!',
        ];
    }
}
