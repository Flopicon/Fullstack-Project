<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartItemController;

Route::group(['prefix' => 'cartItem'], function () {
    Route::get('/', [CartItemController::class, 'index']);
    Route::get('/{id}', [CartItemController::class, 'show']);
    Route::post('/', [CartItemController::class, 'store']);
    Route::put('/{id}', [CartItemController::class, 'update']);
    Route::delete('/{id}', [CartItemController::class, 'destroy']);
});