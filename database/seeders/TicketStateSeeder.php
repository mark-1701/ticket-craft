<?php

namespace Database\Seeders;

use App\Models\TicketState;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TicketStateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $states = [
            'new',
            'open',
            'in progress',
            'on hold',
            'requires approval',
            'resolved',
            'closed',
            'reopened',
            'canceled'
        ];
        foreach ($states as $key => $state) {
            $id = strtoupper(($key + 1) . '_' . str_replace(' ', '_', $state));
            TicketState::create([
                'id' => $id,
                'name' => $state
            ]);
        }
    }
}
