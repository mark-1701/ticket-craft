<?php

namespace Database\Seeders;

use App\Models\Departament;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartamentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = [
            'Finance',
            'Operations',
            'Human Resources',
            'Marketing',
            'Sales',
            'Customer Service',
            'IT',
            'Design',
            'Business Analysis',
            'Quality Assurance',
        ];
        
        foreach ($departments as $key => $departament) {
            $id = strtoupper(($key + 1) . '_' . str_replace(' ', '_', $departament));
            Departament::create([
                'id' => $id,
                'name' => $departament
            ]);
        }
    }
}
