<?php

namespace Database\Factories;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    protected $model = Image::class;

    public function definition(): array
    {
        return [
            'name' => fake()->imageUrl(),
            'source' => fake()->imageUrl(640, 480),
            'productId' => Product::factory()
        ];
    }
}

