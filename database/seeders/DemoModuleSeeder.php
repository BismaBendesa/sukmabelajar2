<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Module;
use App\Models\Page;
use App\Models\Block;
use App\Models\Question;
use App\Models\QuestionOption;
use App\Models\Classroom;


class DemoModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $classroom = Classroom::inRandomOrder()->first();
        $module = Module::factory()->create([
            'classroom_id' => $classroom->id
        ]);

        for ($i = 1; $i <= 6; $i++) {

            $isQuestion = $i % 3 === 0;

            $page = Page::create([
                'module_id' => $module->id,
                'type' => $isQuestion ? 'question' : 'content',
                'title' => "Page $i",
                'position' => $i
            ]);

            if ($isQuestion) {

                $question = Question::create([
                    'page_id' => $page->id,
                    'type' => 'multiple_choice',
                    'question_text' => "Question $i?",
                    'explanation' => [
                        'text' => 'This is explanation for demo'
                    ]
                ]);

                // create 4 options
                for ($j = 1; $j <= 4; $j++) {
                    QuestionOption::create([
                        'question_id' => $question->id,
                        'content' => ['text' => "Option $j"],
                        'is_correct' => $j === 2 // always correct option #2
                    ]);
                }
            } else {

                // content blocks
                Block::create([
                    'page_id' => $page->id,
                    'type' => 'heading',
                    'content' => ['text' => "Heading $i"],
                    'position' => 1
                ]);

                Block::create([
                    'page_id' => $page->id,
                    'type' => 'paragraph',
                    'content' => ['text' => fake()->paragraph()],
                    'position' => 2
                ]);

                Block::create([
                    'page_id' => $page->id,
                    'type' => 'image',
                    'content' => ['url' => 'https://picsum.photos/800/400'],
                    'position' => 3
                ]);
            }
        }
    }
}
