<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Module;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ClassroomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->jobTitle() . ' Kelas';
        return [
            // Nama kelas yang terdengar nyata
            'name' => $name,
            'description' => fake()->paragraph(),
            'slug' => Str::slug($name), // Akan diisi otomatis oleh model
            // Mengambil random dari enum yang Anda tentukan
            'status' => fake()->randomElement(['draft', 'active', 'archived']),
            'level' => fake()->randomElement(['dasar', 'menengah', 'lanjut']),

            // Kode unik (contoh: CLASS-ABCD1)
            'class_code' => strtoupper(Str::random(5)) . fake()->unique()->numberBetween(100, 999),
        ];
    }
    public function withModules($count = 5)
    {
        return $this->has(
            Module::factory()
                ->count($count)
                ->sequence(fn($sequence) => [
                    'position' => $sequence->index + 1,
                ]),
            'modules'
        );
    }
}
