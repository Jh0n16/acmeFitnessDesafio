<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoriaRequest;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Categoria::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoriaRequest $request)
    {
        return Categoria::create([
            'nome' => $request->input('nome'),
            'descricao' => $request->input('descricao')
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Categoria::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoriaRequest $request, string $id)
    {
        return Categoria::findOrFail($id)->update([
            'nome' => $request->input('nome'),
            'descricao' => $request->input('descricao'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return Categoria::destroy($id);
    }
}
