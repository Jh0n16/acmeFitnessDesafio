<?php

use App\Http\Controllers\ClienteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('cliente/', [ClienteController::class, 'index'])->name('cliente.index');
Route::post('cliente/', [ClienteController::class, 'store'])->name('cliente.store');
Route::get('cliente/{cliente}', [ClienteController::class, 'show'])->name('cliente.show');
Route::put('cliente/{cliente}', [ClienteController::class, 'update'])->name('cliente.update');
Route::delete('cliente/{cliente}', [ClienteController::class, 'destroy'])->name('cliente.destroy');
