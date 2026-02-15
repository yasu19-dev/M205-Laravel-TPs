<?php

namespace Database\Factories;

use App\Models\Auteur;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Livre>
 */
class LivreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    // database/factories/LivreFactory.php



public function definition(): array
{
    return [
        'titre' => fake()->sentence(3),
        'annee_publication' => fake()->year(),
        'nombre_pages' => fake()->numberBetween(50, 1000),
        'auteur_id' => Auteur::factory(),
    ];
}
}
