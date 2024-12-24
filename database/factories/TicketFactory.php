<?php

namespace Database\Factories;

use App\Models\Ticket;
use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class TicketFactory extends Factory
{
    protected $model = Ticket::class;

    public function definition()
    {
        return [
            'product_id' => Product::inRandomOrder()->first()->id ?? Product::factory()->create()->id,
            'user_id' => User::inRandomOrder()->first()->id ?? User::factory()->create()->id,
            'quantity' => $this->faker->numberBetween(1, 5),
            'total_price' => $this->faker->randomFloat(2, 20, 500),
            'booking_ticket_code' => strtoupper($this->faker->unique()->bothify('TICKET-####')),
        ];
    }
}
