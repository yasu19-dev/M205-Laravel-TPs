<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // Tu peux utiliser les Factories pour aller plus vite, ou insérer manuellement
\App\Models\Auteur::factory(5)->create(); // Crée 5 auteurs
\App\Models\Livre::factory(10)->create(); // Crée 10 livres
\App\Models\Emprunt::factory(5)->create();
    }
}
