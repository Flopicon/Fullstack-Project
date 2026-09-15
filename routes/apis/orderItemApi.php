<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix'=> 'orderItem'], function(){
    
    //Matches GET: /product
    Route::get('/', function(){
    return 'index orderItem';
});
    //Matches GET:/product/{id}
    Route::get('/{id}', function($id){
        return 'show orderItem: ' . $id;
    });
});