<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            'Admin',
            'Customer',
            'Technician',
        ];

        foreach ($roles as $key => $role) {
            $id = strtoupper(($key + 1) . '_' . str_replace(' ', '_', $role));
            Role::create([
                'id'=> $id,
                'name' => $role,
            ]);
        }
    }
}
