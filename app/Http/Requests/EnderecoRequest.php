<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EnderecoRequest extends FormRequest
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
            'logradouro' => 'required|max:32',
            'cidade' => 'required|max:32',
            'bairro' => 'required|max:32',
            'numero' => 'required|max:4',
            'cep' => 'required|max:8',
            'complemento' => 'required|max:128',
            'cliente_id' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'logradouro.required' => 'O nome do logradouro é obrigatório!',
            'logradouro.max' => 'O nome do logradouro tem um tamaho máximo de 32 caracteres!',

            'cidade.required' => 'O nome da cidade é obrigatorio!',
            'cidade.max' => 'O nome da cidade tem um tamanho máximo de 32 caracteres!',

            'bairro.required' => 'O nome do bairro é obrigatório!',
            'bairro.max' => 'O nome do bairro tem um tamanho máximo de 32 caracteres!',

            'numero.required' => 'O número é obrigatório!',
            'numero.max' => 'O número tem um tamanho máximo de 4 digitos!',

            'cep.required' => 'O CEP é obrigatório!',
            'cep.max' => 'O tamanho máximo para um CEP é 8 digitos!',

            'complemento.required' => 'O complemento é obrigatório!',
            'complemento.max' => 'O complemento tem um tamanho máximo de 128 caracteres!',

            'cliente_id.required' => 'O id do Cliente que possui esse endereço é obrigatório!'
        ];
    }
}
