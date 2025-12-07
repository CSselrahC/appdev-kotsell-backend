<?php

namespace Database\Factories;

use App\Models\Cart;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class CartFactory extends Factory
{
    protected $model = Cart::class;

    public function definition(): array
    {
        return [
            'customersId' => Customer::inRandomOrder()->first()?->customersId ?? Customer::factory(),
            'productId' => Product::inRandomOrder()->first()?->productId ?? Product::factory(),
            'quantity' => fake()->numberBetween(1, 10),
            'price' => fake()->randomFloat(2, 100, 1000)
        ];
    }
}
