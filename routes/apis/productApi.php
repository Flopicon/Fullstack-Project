<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix'=> 'prodcut'], function(){
    
    //Matches GET: /product
    Route::get('/', function(){
    return 'index product';
});
    //Matches GET:/product/{id}
    Route::get('/{id}', function($id){
        return 'show product: ' . $id;
    });
});