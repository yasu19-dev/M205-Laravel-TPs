<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Commande>
 */
class CommandeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'date' => fake()->dateTimeBetween('-1 year', 'now'),
        // client_id sera géré automatiquement par le seeder ou la factory relationship
        'client_id' => \App\Models\Client::factory(), 

        ];
    }
}
