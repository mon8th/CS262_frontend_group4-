<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ticket;
use App\Models\User;
use App\Models\Product;

class TicketSeeder extends Seeder
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

        // Create tickets
        Ticket::factory(30)->create([
            'user_id' => $users->random()->id,
            'product_id' => $products->random()->id,
        ]);
    }
}
