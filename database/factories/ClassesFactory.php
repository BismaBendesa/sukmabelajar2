<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ClassesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // Nama kelas yang terdengar nyata
            'name' => fake()->jobTitle() . ' Class',
            'description' => fake()->paragraph(),

            // Mengambil random dari enum yang Anda tentukan
            'status' => fake()->randomElement(['draft', 'active', 'archived']),
            'level' => fake()->randomElement(['dasar', 'menengah', 'lanjut']),

            // Kode unik (contoh: CLASS-ABCD1)
            'class_code' => strtoupper(Str::random(5)) . fake()->unique()->numberBetween(100, 999),
        ];
    }
}
