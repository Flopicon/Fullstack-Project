<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
        try {
            // Sort
            $sortBy = $request->query('sortBy', 'id');
            $sortDir = $request->query('sortDir', 'desc');

            // Pagination
            $per_page = $request->input('perpage', 5);

            // Search + Relationship
            $search = $request->input('search');

            $users = User::with('orders')
                ->when($search, function ($query, $search) {
                    return $query->where('name', 'LIKE', "%{$search}%");
                })
                ->orderBy($sortBy, $sortDir)
                ->paginate($per_page);

            return $users;

        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function show(string $id)
    {
        $user = User::with('orders')->findOrFail($id);

        return $user;
    }

    public function store(Request $request)
    {
        try {
            $validate = $request->validate([
                'name'     => 'required|string|max:255',
                'email'    => 'required|email|unique:users,email',
                'password' => 'required|string|min:6',
                'role'     => 'required|string|max:50',
            ]);

            $user = User::create([
                'name'     => $validate['name'],
                'email'    => $validate['email'],
                'password' => $validate['password'],
                'role'     => $validate['role'],
            ]);

            return $user;

        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email',
            'password' => 'required|string|min:6',
            'role'     => 'required|string|max:50',
        ]);

        $user = User::findOrFail($id);

        $user->update($validate);

        return $user;
    }

    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return response()->json([
            'message' => 'User deleted successfully'
        ]);
    }
}
