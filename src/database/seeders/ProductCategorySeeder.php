<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    public function run(): void
    {
        $products = Product::all();
        $categories = Category::all();
        
        foreach ($products as $product) {
            $randomCategories = $categories->random(2); // 2 random categories per product
            foreach ($randomCategories as $category) {
                ProductCategory::firstOrCreate([
                    'productId' => $product->productId,
                    'categoryId' => $category->categoryId
                ]);
            }
        }
    }
}
