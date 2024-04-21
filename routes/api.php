<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EnderecoController;
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