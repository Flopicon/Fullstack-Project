<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
public function index(){
    $users=User::all;
    return response()->json($users);
}
public function store(Request $request){
    $user = User::create([
    'name'=>$request->name,
    'email'=>$request->email,
    'password'=>$request->password,
    'role'=>$request->role,
    ]);
    return response()->json($user);
}
}
