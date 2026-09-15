<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\OrderItem;

class OrderItemController extends Controller
{
    public function index()
    {
        $orderItems = OrderItem::all();
        return $orderItems;
    }
    public function store(Request $request)
    {
        $validate = $request->validate([
                'order_id'   => 'required|exists:orders,id',
                'product_id' => 'required|exists:products,id',
                'quantity'   => 'required|integer|min:1',
                'price'      => 'required|numeric|min:0',
            ]);

        $orderItem = OrderItem::create([
                'order_id'   => $validate['order_id'],
                'product_id' => $validate['product_id'],
                'quantity'   => $validate['quantity'],
                'price'      => $validate['price'],
            ]);

        return $orderItem;
    }
    
    public function show(string $id)
    {
        $orderItem = OrderItem::findOrFail($id);
        return $orderItem;
    }

    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
                'quantity' => 'required|integer|min:1',
                'price'    => 'required|numeric|min:0',

            ]);
        $orderItem = OrderItem::findOrFail($id);
        $orderItem->update($validate);
        return $orderItem;
    }
    public function destroy(string $id)
    {
        $orderItem = OrderItem::findOrFail($id)->delete();
    }
}
