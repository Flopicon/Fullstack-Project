<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;

Route::group(['prefix' => 'cart'], function () {
    Route::get('/', [CartController::class, 'index']);
    Route::get('/{id}', [CartController::class, 'show']);
    Route::post('/', [CartController::class, 'store']);
    Route::put('/{id}', [CartController::class, 'update']);
    Route::delete('/{id}', [CartController::class, 'destroy']);
});