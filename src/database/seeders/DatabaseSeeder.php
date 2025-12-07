<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AdminSeeder::class,
            CustomerSeeder::class,
            CategorySeeder::class,
            ProductSeeder::class,
            ImageSeeder::class,
            ProductCategorySeeder::class,  // NEW - Link products to categories
            ProductImageSeeder::class,     // NEW - Link products to images
            CartSeeder::class,
            OrderSeeder::class
        ]);
    }
}
