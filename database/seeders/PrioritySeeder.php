<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Priority;

class PrioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $priorities = [
            'Alta',
            'Media',
            'Baja',
            'Urgente',
            'Prioridad Normal',
            'Crítica',
        ];

        foreach ($priorities as $key => $priority) {
            $id = strtoupper(($key + 1) . '_' . str_replace(' ', '_', $priority));
            Priority::create([
                'id' => $id,
                'name' => $priority
            ]);
        }  
    }
}
