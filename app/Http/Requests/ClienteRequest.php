<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
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
            'nomeCompleto' => 'required|max:64',
            'cpf' => 'required|unique:clientes,cpf|max:11',
            'dataDeNascimento' => 'required|date_format:Y-m-d',
        ];
    }

    public function messages(): array
    {
        return [
            'nomeCompleto.required' => 'O nome é obrigatório!',
            'nomeCompleto.max' => 'O nome não pode ter mais de 64 caracteres!',

            'cpf.required' => 'O CPF é obrigatório!',
            'cpf.unique' => 'O CPF é inválido!',
            'cpf.max' => 'O tamanho máximo para um CPF é 11 digitos!',

            'dataDeNascimento.required' => 'A data de nascimento é obrigatória!',
            'dataDeNascimento.date_format' => 'A data deve estar no formato: Ano-mes-dia (Y-m-d)',
        ];
    }
}
