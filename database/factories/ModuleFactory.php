<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Module>
 */
class ModuleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'classroom_id' => null, // will be filled automatically later
            'title' => $title = $this->faker->sentence(3),
            'slug' => Str::slug($title),
            'type' => $this->faker->randomElement(['materi', 'kuis', 'uts', 'uas']),
            'position' => 1, // we’ll improve this later
        ];
    }
    public function configure()
    {
        return $this->afterCreating(function ($module) {

            // 🎯 MATERIAL MODULE
            if ($module->type === 'materi') {

                \App\Models\ModuleMaterial::create([
                    'module_id' => $module->id,
                    'level' => 'mudah',
                    'status' => 'active',
                    'duration_minutes' => 15,
                    'description' => 'Demo materi'
                ]);

                // generate content pages
                for ($i = 1; $i <= 5; $i++) {

                    $page = \App\Models\Page::create([
                        'module_id' => $module->id,
                        'type' => $i === 3 ? 'question' : 'content',
                        'position' => $i
                    ]);

                    if ($page->type === 'content') {

                        \App\Models\Block::create([
                            'page_id' => $page->id,
                            'type' => 'heading',
                            'content' => ['text' => "Materi Heading $i"],
                            'position' => 1
                        ]);

                        \App\Models\Block::create([
                            'page_id' => $page->id,
                            'type' => 'paragraph',
                            'content' => ['text' => fake()->paragraph()],
                            'position' => 2
                        ]);
                    } else {

                        $question = \App\Models\Question::create([
                            'page_id' => $page->id,
                            'type' => 'multiple_choice',
                            'question_text' => "Soal materi $i",
                            'explanation' => ['text' => 'Penjelasan']
                        ]);

                        for ($j = 1; $j <= 4; $j++) {
                            \App\Models\QuestionOption::create([
                                'question_id' => $question->id,
                                'content' => ['text' => "Pilihan $j"],
                                'is_correct' => $j === 2
                            ]);
                        }
                    }
                }
            }

            // 🎯 TEST MODULE
            if (in_array($module->type, ['kuis', 'uts', 'uas'])) {

                \App\Models\ModuleTest::create([
                    'module_id' => $module->id,
                    'max_attempt' => 1,
                    'minimum_pass_score' => 70,
                    'time_limit_minutes' => 30
                ]);

                // ALL pages = question
                for ($i = 1; $i <= 5; $i++) {

                    $page = \App\Models\Page::create([
                        'module_id' => $module->id,
                        'type' => 'question',
                        'position' => $i
                    ]);

                    $question = \App\Models\Question::create([
                        'page_id' => $page->id,
                        'type' => 'multiple_choice',
                        'question_text' => "Soal test $i",
                        'explanation' => ['text' => 'Penjelasan test']
                    ]);

                    for ($j = 1; $j <= 4; $j++) {
                        \App\Models\QuestionOption::create([
                            'question_id' => $question->id,
                            'content' => ['text' => "Pilihan $j"],
                            'is_correct' => $j === 1
                        ]);
                    }
                }
            }
        });
    }
}
