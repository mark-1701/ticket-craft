<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
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
            State::create([
                'id' => $id,
                'name' => $state
            ]);
        }
    }
}
