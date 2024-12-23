<?php

namespace Database\Factories;

use App\Models\Ticket;
use Illuminate\Database\Eloquent\Factories\Factory;

class TicketFactory extends Factory
{
    protected $model = Ticket::class;

    public function definition()
    {
        return [
            'product_id' => $this->faker->numberBetween(1, 50), // Adjust for product seeding
            'user_id' => $this->faker->numberBetween(1, 50),    // Adjust for user seeding
            'quantity' => $this->faker->numberBetween(1, 5),
            'total_price' => $this->faker->randomFloat(2, 20, 500),
            'booking_ticket_code' => strtoupper($this->faker->unique()->bothify('TICKET-####')),
        ];
    }
}
