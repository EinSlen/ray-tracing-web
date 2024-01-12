<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use function Laravel\Prompts\text;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Scene>
 */
class SceneFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::all()->random();

        return [

            'name' => $this->faker->text(20),
            'team' => $this->faker->word,
            'description' => $this->faker->paragraph,
            'scenes' => $this->faker->text,
            'image_path' => $this->faker->imageUrl(),
            'thumbnail_path' => "thumbnail/sample.png",
            'executable_link' => $this->faker->url,
            'user_id' => $user->id,
        ];
    }
}
