<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        //sort dynamic
        // $sortBy = $request->input('sortBy');
        // $sortDir = $request->input('sortDir');

        //sort static
        $sortBy = $request->query('sortBy', 'id');
        $sortDir = $request ->query ('sortDir', 'desc');


        //search and relationship
        $search = $request->input('search');
        $product = Product::with('category')->when($search, function ($query, $search) {
            return $query->where('name', 'LIKE', "%{$search}%");
        })
            //static & dynamic
            ->orderBy($sortBy, $sortDir)
            //search
            ->get();
        return response()->json($product);


        // $products = Product::all();
        // return $products;
    }

    public function store(Request $request)
    {

        try {
            $validate = $request->validate([
                'name'        => 'required|string|max:255',
                'price'       => 'required|numeric|min:0',
                'category_id' => 'required|exists:categories,id'
            ]);

            $product = Product::create([
                'name'        => $validate['name'],
                'price'       => $validate['price'],
                'category_id' => $validate['category_id']
            ]);

            return $product;
        } catch (\Exception $e) {
            return response()->json([
                'message'  => $e->getMessage()
            ], 500);
        }
    }
    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        return $product;
    }

    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'name'        => 'required|string|max:255',
            'price'       => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id'
        ]);

        $product = Product::findOrFail($id);
        $product->update($validate);
        return $product;
    }

    public function destroy(string $id)
    {
        $product = Product::findOrFail($id)->delete();
    }
}
