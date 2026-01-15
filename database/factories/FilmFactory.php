<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Film>
 */
class FilmFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titre' => $this->faker->sentence(3),
            'pays' => $this->faker->country(),
            'annee' => $this->faker->year(),
            'duree' => $this->faker->time('H:i:s', '02:00:00'),
            'genre' => $this->faker->randomElement(['Action', 'Comédie', 'Drame', 'Horreur', 'Science-fiction', 'Romance']),

        ];
    }
}
