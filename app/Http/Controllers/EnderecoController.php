<?php

namespace App\Http\Controllers;

use App\Http\Requests\EnderecoRequest;
use App\Models\Endereco;
use Illuminate\Http\Request;

class EnderecoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Endereco::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EnderecoRequest $request)
    {
        Endereco::create([
            'logradouro' => $request->input('logradouro'),
            'cidade' => $request->input('cidade'),
            'bairro' => $request->input('bairro'),
            'numero' => $request->input('numero'),
            'cep' => $request->input('cep'),
            'complemento' => $request->input('complemento'),
            'cliente_id' => $request->input('cliente_id')
        ]);

        return json_encode(["mensagem"=> "Endereço criado com sucesso!"]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Endereco::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EnderecoRequest $request, string $id)
    {
        Endereco::findOrFail($id)->update([
            'logradouro' => $request->input('logradouro'),
            'cidade' => $request->input('cidade'),
            'bairro' => $request->input('bairro'),
            'numero' => $request->input('numero'),
            'cep' => $request->input('cep'),
            'complemento' => $request->input('complemento'),
            'cliente_id' => $request->input('cliente_id')
        ]);

        return json_encode(["mensagem"=> "Endereço modificado com sucesso!"]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Endereco::destroy($id);

        return json_encode(["mensagem"=> "Endereço deletado com sucesso!"]);

    }
}
