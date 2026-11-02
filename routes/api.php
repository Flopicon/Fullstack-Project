<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\R2FileController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::get('/me', [AuthenticationController::class, 'me'])->middleware('auth:sanctum');
Route::post('/login',[AuthenticationController::class, 'login']);
Route::post('/logout',[AuthenticationController::class, 'logout'])->middleware('auth:sanctum');
Route::post('/register',[AuthenticationController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/r2/files', [R2FileController::class, 'store']);
    Route::get('/r2/files/{name}', [R2FileController::class, 'download']);
});
Route::post('/send-mail', [NotificationController::class, 'sendMail']);


require __DIR__ . '/apis/productApi.php';
require __DIR__ . '/apis/cartItemApi.php';
require __DIR__ . '/apis/orderItemApi.php';
require __DIR__ . '/apis/addressApi.php';
require __DIR__ . '/apis/categoryApi.php';
require __DIR__ . '/apis/paymentApi.php';
require __DIR__ . '/apis/userApi.php';
require __DIR__ . '/apis/cartApi.php';
require __DIR__ . '/apis/orderApi.php';
