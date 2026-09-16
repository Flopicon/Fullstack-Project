<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderItemController;

Route::group(['prefix' => 'orderItem'], function () {
    Route::get('/', [OrderItemController::class, 'index']);
    Route::get('/{id}', [OrderItemController::class, 'show']);
    Route::post('/', [OrderItemController::class, 'store']);
    Route::put('/{id}', [OrderItemController::class, 'update']);
    Route::delete('/{id}', [OrderItemController::class, 'destroy']);

});