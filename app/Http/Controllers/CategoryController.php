<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return $categories;
    }

    public function store(Request $request)
    {
        try {
            $validate = $request->validate([
                'name'        => 'required|string|max:255|unique:categories,name',
                'description' => 'nullable|string',
            ]);

            $category = Category::create($validate);
            return $category;
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function show(string $id)
    {
        $category = Category::findOrFail($id);
        return $category;
    }

    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'name'        => 'sometimes|string|max:255|unique:categories,name,' . $id,
            'description' => 'nullable|string',
        ]);

        $category = Category::findOrFail($id);
        $category->update($validate);
        return $category;
    }

    public function destroy(string $id)
    {
        $category = Category::findOrFail($id)->delete();
    }
}
