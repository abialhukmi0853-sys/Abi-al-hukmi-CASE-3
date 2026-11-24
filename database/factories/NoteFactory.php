<?php

namespace Database\Factories;

use App\Models\Note;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Note>
 */
class NoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
    'user_id' => \App\Models\User::factory(),
    'title' => fake()->sentence(4),
    'content' => fake()->paragraph(),
    'priority' => fake()->randomElement(['rendah', 'sedang', 'tinggi']),
];
    }
}
