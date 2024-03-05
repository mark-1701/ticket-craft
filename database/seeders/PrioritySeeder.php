<?php

namespace Database\Seeders;

use App\Models\Priority;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PrioritySeeder extends Seeder
{
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
                'level' => $priority
            ]);
        }        
    }
}
