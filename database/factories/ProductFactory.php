<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'category' => $this->faker->randomElement(['Electronics', 'Clothing', 'Books']),
            'price' => $this->faker->randomFloat(2, 10, 1000),
            'quantity' => $this->faker->numberBetween(1, 100),
            'location' => $this->faker->city(),
            'image' => $this->faker->imageUrl(),
            'description' => $this->faker->sentence(),
            'event_date' => $this->faker->dateTimeBetween('+1 week', '+1 year'),
            'trending' => $this->faker->boolean(),
            'user_id' => User::factory(), 
        ];
    }
}
