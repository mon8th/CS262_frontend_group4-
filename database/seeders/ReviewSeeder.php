<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Review;
use App\Models\User;
use App\Models\Product;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        // Ensure users exist
        $users = User::all();
        if ($users->isEmpty()) {
            User::factory(10)->create();
            $users = User::all();
        }

        // Ensure products exist
        $products = Product::all();
        if ($products->isEmpty()) {
            Product::factory(10)->create();
            $products = Product::all();
        }

        // Create reviews
        Review::factory(50)->create([
            'user_id' => $users->random()->id, // Assign valid user ID
            'product_id' => $products->random()->id, // Assign valid product ID
        ]);
    }
}
