<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriaRequest extends FormRequest
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
            'nome' => 'required|unique:categorias,nome|max:32',
            'descricao' => 'required|max:128',
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'O nome da categoria é obrigatório!',
            'nome.unique' => 'O nome da categoria já existe!',
            'nome.max' => 'O nome da categoria deve ter no máximo 32 caracteres!',

            'descricao.required' => 'A descricao é obrigatória!',
            'descricao.max' => 'O tamanho descricao deve ter no máximo 128 caracteres!',
        ];
    }
}
