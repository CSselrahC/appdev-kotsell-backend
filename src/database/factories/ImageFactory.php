<?php

namespace Database\Factories;

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    protected $model = Image::class;

    public function definition(): array
    {
        return [
            'name' => fake()->word() . '.jpg',
            'source' => 'products/' . fake()->uuid . '.jpg'
        ];
    }
}
