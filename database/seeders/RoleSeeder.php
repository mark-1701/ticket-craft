<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            'Admin',
            'Manager',
            'Employee',
            'Supervisor',
            'Coordinator',
            'Team Lead',
            'Developer',
            'Designer',
            'Analyst',
            'Tester',
        ];

        foreach ($roles as $roleName) {
            Role::create([
                'name' => $roleName,
            ]);
        }
    }
}
