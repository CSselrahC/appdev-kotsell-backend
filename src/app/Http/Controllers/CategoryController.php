<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return Category::with('products')->get();
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        $category = Category::create($request->all());
        return response()->json($category->load('products'), 201);
    }

    public function show(Category $category)
    {
        return $category->load('products');
    }

    public function edit(Category $category)
    {
        
    }

    public function update(Request $request, Category $category)
    {
        $category->update($request->all());
        return $category->load('products');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json(null, 204);
    }
}
