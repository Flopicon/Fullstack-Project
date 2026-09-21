<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    // Get all carts
    public function index(Request $request)
    {
        try {
            // Search
            $search = $request->input('search');

            // Filter by user
            $userId = $request->input('user_id');

            // Sort
            $sortBy = $request->input('sortBy');
            $sortDir = $request->input('sortDir');

            // Limit
            $limit = $request->query('limit', 10);

            $carts = Cart::with('user')
                ->when($search, function ($query, $search) {
                    return $query->where('id', 'LIKE', "%{$search}%");
                })
                ->when($userId, function ($query, $userId) {
                    return $query->where('user_id', $userId);
                })
                ->orderBy($sortBy ?? 'id', $sortDir ?? 'desc')
                ->paginate($limit);

            return response()->json($carts);

        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    // Get one cart
    public function show(string $id)
    {
        try {
            $cart = Cart::with('user')->find($id);

            if (!$cart) {
                return response()->json([
                    'message' => 'Cart not found'
                ], 404);
            }

            return response()->json([
                'message' => 'Cart retrieved successfully',
                'data' => $cart
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    // Create cart
    public function store(Request $request)
    {
        try {
            $validate = $request->validate([
                'user_id' => 'required|exists:users,id',
            ]);

            $cart = Cart::create([
                'user_id' => $validate['user_id'],
            ]);

            return response()->json([
                'message' => 'Cart created successfully',
                'data' => $cart
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    // Update cart
    public function update(Request $request, string $id)
    {
        try {
            $validate = $request->validate([
                'user_id' => 'sometimes|exists:users,id',
            ]);

            $cart = Cart::find($id);

            if (!$cart) {
                return response()->json([
                    'message' => 'Cart not found'
                ], 404);
            }

            $cart->update($validate);

            return response()->json([
                'message' => 'Cart updated successfully',
                'data' => $cart
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    // Delete cart
    public function destroy(string $id)
    {
        try {
            $cart = Cart::find($id);

            if (!$cart) {
                return response()->json([
                    'message' => 'Cart not found'
                ], 404);
            }

            $cart->delete();

            return response()->json([
                'message' => 'Cart deleted successfully'
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }
}