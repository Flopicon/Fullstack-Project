<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\CartItem;

class CartItemController extends Controller
{
    public function index()
    {
        $cartItems = CartItem::all();
        return $cartItems;
    }
    public function store(Request $request)
    {
        $validate = $request->validate([
            'cart_id' => 'required|exists:cart_id',
            'product_id' => 'required|exists:products,id',
            'quantity'   => 'required|integer|min:1',
        ]);
        $cartItem = CartItem::create([
            'cart_id' => $validate['cart_id'],
            'product_id' => $validate['product_id'],
            'quantity' => $validate['quantity'],
        ]);
        return $cartItem;
    }
    public function show(string $id)
    {
        $cartItem = CartItem::findOrFailI($id);
        return $cartItem;
    }
    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $cartItem = CartItem::findOrFail($id);
        $cartItem->update($validate);
        return $cartItem;
    }
    public function destroy(string $id)
    {
        $cartItem = CartItem::findOrFail($id)->delete();
    }
}
