<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    public function index()
    {
        $cart = Cart::all();
        return $cart;
    }
    public function store(Request $request)
    {
        try {
            $validate = $request->validate([
                'user_id' => 'required|exists:users,id',
            ]);

            $cart = Cart::create([
                'user_id' => $validate['user_id'],
            ]);

            return $cart;

        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }
    public function show(string $id)
    {
        $cart = Cart::findOrFail($id);
        return $cart;
    }

    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'user_id' => 'sometimes|exists:users,id',
        ]);

        $cart = Cart::findOrFail($id);
        $cart->update($validate);
        return $cart;
    }

    public function destroy(string $id)
    {
        $cart = Cart::findOrFail($id)->delete();
    }
}
