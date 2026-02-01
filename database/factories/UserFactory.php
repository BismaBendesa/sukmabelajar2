<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $role = fake()->randomElement(['mhs', 'dosen']);

        return [
            'username' => fake()->unique()->userName(),
            'email' => fake()->unique()->safeEmail(),
            'password' => bcrypt('password'), // password default
            'nim' => $role === 'mhs' ? fake()->unique()->numerify('##########') : null,
            'role' => $role,
            'level' => fake()->numberBetween(1, 10),
            'exp' => fake()->numberBetween(0, 1000),
            'average_score' => fake()->randomFloat(2, 0, 100),
            'total_study_minutes' => fake()->numberBetween(0, 10000),
            'login_streak' => fake()->numberBetween(0, 30),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    // public function unverified(): static
    // {
    //     return $this->state(fn (array $attributes) => [
    //         'email_verified_at' => null,
    //     ]);
    // }
}
