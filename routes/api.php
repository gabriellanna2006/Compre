<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ItemPedidoController;

Route::post('/register', [AuthController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {

    Route::apiResource('pedidos', PedidoController::class);

    Route::apiResource('item-pedidos', ItemPedidoController::class);

});