<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition(): array
    {
        return [
            'customersId' => Customer::inRandomOrder()->first()?->customersId ?? Customer::factory(),
            'totalPrice' => fake()->randomFloat(2, 500, 50000),
            'paymentMethod' => fake()->randomElement(['Credit Card', 'Debit Card', 'Cash on Delivery']),
            'deliveryAddress' => fake()->address(),
            'purchaseDate' => fake()->dateTimeBetween('-1 month', 'now')
        ];
    }
}
