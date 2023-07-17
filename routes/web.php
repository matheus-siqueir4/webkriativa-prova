<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
use App\Http\Controllers\CompraController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\ListaPedidos;

Route::get('/', [CompraController::class, 'index'])->name('index');

Route::post('/produtos', [CompraController::class, 'store']);

Route::get('/produtos/cadastrar', [CompraController::class, 'create']);

Route::get('/produtos/detalhes/{id}', [CompraController::class, 'show']);

Route::get('/produto/cadastrar', function () {
    return view('/produtos/cadastrar');
});

Route::get('/clientes', [UserController::class, 'allUsers']);

Route::get('/produto/{id}', [CompraController::class, 'adicionarPedido']);

Route::get('/dashboard', ListaPedidos::class)->name("dashboard");

Route::delete('/pedidos/excluir/{id}', [UserController::class, 'deletePedido']);

Route::delete('/produtos/excluir/{id}', [CompraController::class, 'deleteProduto']);

Route::get('/produtos/editar/{id}', [CompraController::class, 'editProduto']);

Route::put('/produtos/update/{id}', [CompraController::class, 'updateProduto']);

Route::put('/status/update/{id}', [UserController::class, 'updateStatus']);

Route::put('/status/pagar/{id}', [UserController::class, 'updatePagamento']);

