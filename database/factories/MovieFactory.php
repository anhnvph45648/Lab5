<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'         => fake()->name(),
            'poster'        => fake()->imageUrl(250),
            'intro'         => fake()->text(50),
            'release_date'  => fake()->date(),
            'genre_id'      => rand(1, 4),
        ];
    }
}
