<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produit>
 */
class ProduitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'nom' => fake()->words(2, true), // ex: "Chaise bureau"
        'qte_stock' => fake()->numberBetween(0, 100),
        'prix' => fake()->randomFloat(2, 5, 500), // 2 décimales, min 5, max 500
        ];
    }
}
