<?php
namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function index()
    {
        return ProductCategory::with(['product', 'category'])->get();
    }

    public function show(ProductCategory $productCategory)
    {
        return $productCategory->load(['product', 'category']);
    }
}
