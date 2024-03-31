<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    public function definition(): array
    {
        $roles = [
            '1_ADMIN',
            '10_TESTER',
            '2_MANAGER',
            '3_EMPLOYEE',
            '4_SUPERVISOR',
            '5_COORDINATOR',
            '6_TEAM_LEAD',
            '7_DEVELOPER',
            '8_DESIGNER',
            '9_ANALYST'
        ];


        return [
            'role_id' => $this->faker->randomElement($roles),
            'name' => fake()->name(),
            'username' => fake()->userName(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'remember_token' => Str::random(10),
        ];
    }

    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
