<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return $products;
    }

    public function store(Request $request)
    {
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
    

