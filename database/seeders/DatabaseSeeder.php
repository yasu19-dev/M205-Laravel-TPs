<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Client;
use App\Models\Commande;
use App\Models\Produit;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Créer 20 produits
        $produits = Produit::factory(20)->create();

        // 2. Créer 10 clients
        Client::factory(10)->create()->each(function ($client) use ($produits) {
            
            // Pour chaque client, créer entre 1 et 3 commandes
            $commandes = Commande::factory(rand(1, 3))->create([
                'client_id' => $client->id
            ]);

            // Pour chaque commande, attacher des produits (Table Pivot)
            $commandes->each(function ($commande) use ($produits) {
                // On prend entre 1 et 5 produits au hasard
                $produitsAleatoires = $produits->random(rand(1, 5));

                foreach ($produitsAleatoires as $produit) {
                    // On attache le produit à la commande avec une quantité (qte_cmd)
                    $commande->produits()->attach($produit->id, [
                        'qte_cmd' => rand(1, 10)
                    ]);
                }
            });
        });
    }

}
