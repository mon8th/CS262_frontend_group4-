<?php

namespace Database\Factories;

use App\Models\Review;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    protected $model = Review::class;

    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 50), // Adjust for user seeding
            'product_id' => $this->faker->numberBetween(1, 50), // Adjust for product seeding
            'review' => $this->faker->paragraph(),
        ];
    }
}
