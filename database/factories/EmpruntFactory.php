<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Livre;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Emprunt>
 */
class EmpruntFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    // database/factories/EmpruntFactory.php



public function definition(): array
{
    return [
        'livre_id' => Livre::factory(), 
        'date_emprunt' => fake()->dateTimeBetween('-2 months', 'now'),
        'date_retour' => fake()->optional()->dateTimeBetween('now', '+1 month'), // 'optional' permet d'avoir des NULL parfois
    ];
}
}
