<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'category' => $this->faker->word(),
            'price' => $this->faker->randomFloat(2, 10, 1000),
            'quantity' => $this->faker->numberBetween(1, 100),
            'location' => $this->faker->city(),
            'image' => $this->faker->imageUrl(640, 480, 'products', true),
            'description' => $this->faker->paragraph(),
            'event_date' => $this->faker->dateTimeBetween('now', '+1 year'),
            'trending' => $this->faker->boolean(),
            'user_id' => $this->faker->numberBetween(1, 50), // Adjust for your user seeding
        ];
    }
}
