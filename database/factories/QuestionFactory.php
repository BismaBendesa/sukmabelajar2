<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'page_id' => 1,
            'type' => 'multiple_choice',
            'question_text' => $this->faker->sentence(),
            'explanation' => [
                'text' => $this->faker->paragraph()
            ]
        ];
    }
}
