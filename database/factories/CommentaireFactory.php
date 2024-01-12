<?php

namespace Database\Factories;

use App\Models\Scene;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CommentaireFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::all()->random();
        $scene = Scene::all()->random();
        return [
            "user_id"=> $user->id,
            "scene_id"=> $scene->id,
            "title"=>fake()->text(20),
            "body"=>fake()->text()
        ];
    }
}
