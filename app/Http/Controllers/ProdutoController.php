<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdutoRequest;
use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Produto::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProdutoRequest $request)
    {
        Produto::create([
            'nome' => $request->input('nome'),
            'cor' => $request->input('cor'),
            'imagem' => $request->input('imagem'),
            'preco' => $request->input('preco'),
            'descricao' => $request->input('descricao'),
            'peso' => $request->input('peso'),
            'categoria_id' => $request->input('categoria_id'),
        ]);

        return json_encode(["mensagem"=> "Produto criado com sucesso!"]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Produto::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProdutoRequest $request, string $id)
    {
        Produto::findOrFail($id)->update([
            'nome' => $request->input('nome'),
            'cor' => $request->input('cor'),
            'imagem' => $request->input('imagem'),
            'preco' => $request->input('preco'),
            'descricao' => $request->input('descricao'),
            'peso' => $request->input('peso'),
            'categoria_id' => $request->input('categoria_id'),
        ]);

        return json_encode(["mensagem"=> "Produto modificado com sucesso!"]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Produto::destroy($id);

        return json_encode(["mensagem"=> "Produto deletado com sucesso!"]);

    }
}

