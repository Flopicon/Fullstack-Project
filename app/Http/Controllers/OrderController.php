<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Get all orders
    public function index()
    {
        try {
            $orders = Order::with([
                'user',
                'address',
                'payment',
                'orderItems'
            ])->get();

            return response()->json([
                'message' => 'Orders retrieved successfully',
                'data' => $orders
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    // Get one order
    public function show(string $id)
    {
        try {
            $order = Order::with([
                'user',
                'address',
                'payment',
                'orderItems'
            ])->find($id);

            if (!$order) {
                return response()->json([
                    'message' => 'Order not found'
                ], 404);
            }

            return response()->json([
                'message' => 'Order retrieved successfully',
                'data' => $order
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    // Create order
    public function store(Request $request)
    {
        try {
            $order = Order::create($request->all());

            return response()->json([
                'message' => 'Order created successfully',
                'data' => $order
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    // Update order
    public function update(Request $request, string $id)
    {
        try {
            $order = Order::find($id);

            if (!$order) {
                return response()->json([
                    'message' => 'Order not found'
                ], 404);
            }

            $order->update($request->all());

            return response()->json([
                'message' => 'Order updated successfully',
                'data' => $order
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    // Delete order
    public function destroy(string $id)
    {
        try {
            $order = Order::find($id);

            if (!$order) {
                return response()->json([
                    'message' => 'Order not found'
                ], 404);
            }

            $order->delete();

            return response()->json([
                'message' => 'Order deleted successfully'
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
