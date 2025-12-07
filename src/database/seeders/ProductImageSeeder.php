<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Image;
use App\Models\ProductImage;
use Illuminate\Database\Seeder;

class ProductImageSeeder extends Seeder
{
    public function run(): void
    {
        $products = Product::all();
        $images = Image::all();
        
        foreach ($products as $product) {
            $randomImages = $images->random(2); // 2 random images per product
            foreach ($randomImages as $image) {
                ProductImage::firstOrCreate([
                    'productId' => $product->productId,
                    'imageId' => $image->imageId
                ]);
            }
        }
    }
}
