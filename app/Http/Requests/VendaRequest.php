<?php

namespace App\Http\Requests;

use App\Rules\FormaDePagamentoValida;
use Illuminate\Foundation\Http\FormRequest;

class VendaRequest extends FormRequest
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
            'dataDaVenda' => 'required|date_format:Y-m-d',
            'variacoesDosProdutos' => 'required|json',
            'formaDePagamento' => ['required', 'string', new FormaDePagamentoValida],
            'cliente_id' => 'required|integer',
            'endereco_id' => 'required|integer',
        ];
    }

    public function messages(): array
    {
        return [
            'dataDaVenda.required' => 'A data da venda é obrigatória!',
            'dataDaVenda.date_format' => 'O formato da data de venda deve ser: Ano-mês-dia (Y-m-d)!',

            'variacoesDosProdutos.required' => 'As variações do prooduto são obrigatórias!',
            'variacoesDosProdutos.json' => 'As variações do produto devem ser um JSON!',

            'formaDePagamento.required' => 'A forma de pagamento é obrigatória!',
            'formaDePagamento.string' => 'A forma de pagamento deve ser uma string!',

            'cliente_id.required' => 'O id do cliente é obrigatório!',
            'cliente_id.integer' => 'O id do cliente deve ser um número inteiro!',

            'endereco_id.required' => 'O id do endereço é obrigatório!',
            'endereco_id.integer' => 'O id do endereço deve ser um número inteiro!',
        ];
    }
}
