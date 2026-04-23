<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Block>
 */
class BlockFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $type = $this->faker->randomElement(['heading', 'paragraph', 'image', 'video', 'audio',]);

        $content = match ($type) {
            'heading' => ['text' => $this->faker->sentence()],
            'paragraph' => ['text' => $this->faker->paragraph()],
            'image' => ['url' => 'https://picsum.photos/800/400'],
            'video' => ['url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ'],
            'audio' => ['url' => 'https://www.soundhelix.com/examples/mp3/SoundHelix-Song-1.mp3'],
        };

        return [
            'page_id' => 1,
            'type' => $type,
            'content' => $content,
            'position' => 1
        ];
    }
}
