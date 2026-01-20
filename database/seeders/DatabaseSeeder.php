<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Insertion des Clients
        DB::table('clients')->insert([
            ['nom' => 'Harroudi', 'prenom' => 'Yasmine'],
            ['nom' => 'SAOUSAOU', 'prenom' => 'Zaid'],
            ['nom' => 'BELGHAZI', 'prenom' => 'Aya'],
        ]);

        // 2. Insertion des Produits
        DB::table('produits')->insert([
            ['nom' => 'PC Portable Dell', 'qte_stock' => 10, 'prix' => 7000],
            ['nom' => 'Souris Logitech', 'qte_stock' => 50, 'prix' => 150],
            ['nom' => 'Clavier Mécanique', 'qte_stock' => 20, 'prix' => 400],
            ['nom' => 'Écran Samsung', 'qte_stock' => 5, 'prix' => 1800],
        ]);

        // 3. Insertion des Commandes
        // On suppose que les IDs commencent à 1 (Harroudi) et 2 (Alaoui)
        DB::table('commandes')->insert([
            ['date' => '2026-01-10', 'client_id' => 1],
            ['date' => '2026-01-15', 'client_id' => 2],
        ]);

        // 4. Insertion des Détails (Table Pivot commande_produit)
        DB::table('commande_produit')->insert([
            // Commande 1 (de Yasmine) contient 1 PC (id 1) et 2 Souris (id 2)
            ['commande_id' => 1, 'produit_id' => 1, 'qte_cmd' => 1],
            ['commande_id' => 1, 'produit_id' => 2, 'qte_cmd' => 2],

            // Commande 2 (de Karim) contient 1 Écran (id 4)
            ['commande_id' => 2, 'produit_id' => 4, 'qte_cmd' => 1],
        ]);
    }
}
