<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


require __DIR__ . '/apis/productApi.php';
require __DIR__ . '/apis/cartItemApi.php';
require __DIR__ . '/apis/orderItemApi.php';
require __DIR__ . '/apis/addressApi.php';
require __DIR__ . '/apis/categoryApi.php';
require __DIR__ . '/apis/paymentApi.php';
require __DIR__ . '/apis/userApi.php';
require __DIR__ . '/apis/cartApi.php';
require __DIR__ . '/apis/orderApi.php';

