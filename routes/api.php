<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EnderecoController;
use App\Http\Controllers\EstoqueController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\VendaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Clientes
Route::get('cliente/', [ClienteController::class, 'index'])->name('cliente.index');
Route::post('cliente/', [ClienteController::class, 'store'])->name('cliente.store');
Route::get('cliente/{cliente}', [ClienteController::class, 'show'])->name('cliente.show');
Route::put('cliente/{cliente}', [ClienteController::class, 'update'])->name('cliente.update');
Route::delete('cliente/{cliente}', [ClienteController::class, 'destroy'])->name('cliente.destroy');

// Enderecos
Route::get('endereco/', [EnderecoController::class, 'index'])->name('endereco.index');
Route::post('endereco/', [EnderecoController::class, 'store'])->name('endereco.store');
Route::get('endereco/{endereco}', [EnderecoController::class, 'show'])->name('endereco.show');
Route::put('endereco/{endereco}', [EnderecoController::class, 'update'])->name('endereco.update');
Route::delete('endereco/{endereco}', [EnderecoController::class, 'destroy'])->name('endereco.destroy');

// Categorias
Route::get('categoria/', [CategoriaController::class, 'index'])->name('categoria.index');
Route::post('categoria/', [CategoriaController::class, 'store'])->name('categoria.store');
Route::get('categoria/{categoria}', [CategoriaController::class, 'show'])->name('categoria.show');
Route::put('categoria/{categoria}', [CategoriaController::class, 'update'])->name('categoria.update');
Route::delete('categoria/{categoria}', [CategoriaController::class, 'destroy'])->name('categoria.destroy');

// Produtos
Route::get('produto/', [ProdutoController::class, 'index'])->name('produto.index');
Route::post('produto/', [ProdutoController::class, 'store'])->name('produto.store');
Route::get('produto/{produto}', [ProdutoController::class, 'show'])->name('produto.show');
Route::put('produto/{produto}', [ProdutoController::class, 'update'])->name('produto.update');
Route::delete('produto/{produto}', [ProdutoController::class, 'destroy'])->name('produto.destroy');

// Estoques
Route::get('estoque/', [EstoqueController::class, 'index'])->name('estoque.index');
Route::post('estoque/', [EstoqueController::class, 'store'])->name('estoque.store');
Route::get('estoque/{estoque}', [EstoqueController::class, 'show'])->name('estoque.show');
Route::put('estoque/{estoque}', [EstoqueController::class, 'update'])->name('estoque.update');
Route::delete('estoque/{estoque}', [EstoqueController::class, 'destroy'])->name('estoque.destroy');

// Vendas
Route::get('venda/', [VendaController::class, 'index'])->name('venda.index');
Route::post('venda/', [VendaController::class, 'store'])->name('venda.store');
Route::get('venda/{venda}', [VendaController::class, 'show'])->name('venda.show');
Route::put('venda/{venda}', [VendaController::class, 'update'])->name('venda.update');
Route::delete('venda/{venda}', [VendaController::class, 'destroy'])->name('venda.destroy');

// Mais Vendidos
route::get('maisVendidos/', []);