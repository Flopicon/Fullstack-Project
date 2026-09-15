<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix'=> 'cartItem'], function(){
    
    //Matches GET: /product
    Route::get('/', function(){
    return 'index cartItem';
});
    //Matches GET:/product/{id}
    Route::get('/{id}', function($id){
        return 'show cartItem: ' . $id;
    });
});