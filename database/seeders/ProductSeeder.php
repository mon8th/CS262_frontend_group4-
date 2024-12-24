<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\User;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();

        if ($users->isEmpty()) {
            User::factory(10)->create();
            $users = User::all();
        }

        Product::factory(50)->create([
            'user_id' => $users->random()->id,
        ]);
    }
}
