<?php

namespace App\Http\Controllers;

use App\Http\Requests\EstoqueRequest;
use App\Models\Estoque;
use Illuminate\Http\Request;

class EstoqueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Estoque::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EstoqueRequest $request)
    {
        return Estoque::created([
            'tamanho' => $request->input('tamanho'),
            'quantidadeDoEstoque' => $request->input('quantidadeDoEstoque'),
            'produto_id' => $request->input('produto_id')
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Estoque::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EstoqueRequest $request, string $id)
    {
        return Estoque::findOrFail($id)->update([
            'tamanho' => $request->input('tamanho'),
            'quantidadeDoEstoque' => $request->input('quantidadeDoEstoque'),
            'produto_id' => $request->input('produto_id')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return Estoque::destroy($id);
    }
}
