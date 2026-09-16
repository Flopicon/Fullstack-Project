<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
  
    public function index()
    {
        $users = User::all();
        return $users;
    }

    public function show(string $id)
    {
        $user = User::find($id);
        return $user;
    }
    public function store(Request $request)
    {
        try {
            $validate =$request-> validate([
               'name'     => 'required|string|max:255',
                'email'    => 'required|string|email|max:255|unique:users,email',
                'password' => 'required|string|min:6',
                'role'     => 'required|string|max:50',
            ]);
            $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role' => $request->role,
        ]);
        return $user;
        }catch(\Exception $e){
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }

    }
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role' => $request->role,
        ]);
        return $user;
    }
    public function destroy(string $id)
    {
         $user = User::findOrFail($id)->delete();
    }
}
