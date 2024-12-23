<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ticket;

class TicketSeeder extends Seeder
{
    public function run(): void
    {
        Ticket::factory(30)->create(); // Generate 30 tickets
    }
}
