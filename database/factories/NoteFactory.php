<?php

namespace Database\Factories;

use App\Models\Note;
use App\Models\User;
use App\Models\Scene;
use Illuminate\Database\Eloquent\Factories\Factory;

class NoteFactory extends Factory
{
    protected $model = Note::class;

    public function definition()
    {
        $user = User::all()->random();
        $scene = Scene::all()->random();
        return [
            'user_id' => $user->id,
            'scene_id' => $scene->id,
            'valeur' => fake()->numberBetween(0, 5)
        ];
    }
}
