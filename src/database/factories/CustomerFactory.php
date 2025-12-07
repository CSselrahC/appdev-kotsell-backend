<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class CustomerFactory extends Factory
{
    protected $model = Customer::class;

    public function definition(): array
    {
        return [
            'username' => fake()->unique()->userName(),
            'email' => fake()->unique()->safeEmail(),
            'password' => 'password',
            'firstName' => fake()->firstName(),
            'lastName' => fake()->lastName(),
            'street' => fake()->streetAddress(),
            'barangay' => fake()->city(),
            'city' => fake()->city(),
            'postalCode' => fake()->postcode()
        ];
    }
}
