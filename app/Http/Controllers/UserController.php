<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //Get all users to use it
    public function index(){
    $users=User::all();
    return $users;
}
//Get one user
public function show( string $id){
    $user=User::find($id);
    return $user;
}
public function store(Request $request){
    $user = User::create([
    'name'=>$request->name,
    'email'=>$request->email,
    'password'=>$request->password,
    'role'=>$request->role,
    ]);
   return $user;
}
public function update(Request $request, string $id){
 $user =User::find($id);
 $user->update([
    'name'=>$request->name,
    'email'=>$request->email,
    'password'=>$request->password,
    'role'=>$request->role,
 ]);
 return $user;
 
}
 public function destroy( string $id)
    {
        $user = User::find($id);

        $user->delete();

        return response()->json([
            'message' => 'User deleted successfully'
        ]);
    }
}
