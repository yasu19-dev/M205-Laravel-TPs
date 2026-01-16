<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CinemaSeeder extends Seeder
{
    public function run()
    {
        // 1. On vide les tables pour éviter les doublons si on relance le seeder
        // On désactive la vérification des clés étrangères temporairement pour pouvoir vider
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('participations')->truncate();
        DB::table('films')->truncate();
        DB::table('acteurs')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // 2. Création des Films
        // On récupère l'ID généré pour l'utiliser dans la jointure
        $idInception = DB::table('films')->insertGetId([
            'titre' => 'Inception',
            'pays' => 'USA',
            'annee' => 2010,
            'duree' => '02:28:00',
            'genre' => 'Science Fiction'
        ]);

        $idIntouchables = DB::table('films')->insertGetId([
            'titre' => 'Intouchables',
            'pays' => 'France',
            'annee' => 2011,
            'duree' => '01:52:00',
            'genre' => 'Comédie'
        ]);

        $idJoker = DB::table('films')->insertGetId([
            'titre' => 'Joker',
            'pays' => 'USA',
            'annee' => 2019,
            'duree' => '02:02:00',
            'genre' => 'Drame'
        ]);

        // 3. Création des Acteurs
        $idLeo = DB::table('acteurs')->insertGetId([
            'nom' => 'DiCaprio',
            'prenom' => 'Leonardo',
            'pays' => 'USA',
            'date_naissance' => '1974-11-11',
            'tel' => null
        ]);

        $idOmar = DB::table('acteurs')->insertGetId([
            'nom' => 'Sy',
            'prenom' => 'Omar',
            'pays' => 'France',
            'date_naissance' => '1978-01-20',
            'tel' => '0600000000'
        ]);

        $idPhoenix = DB::table('acteurs')->insertGetId([
            'nom' => 'Phoenix',
            'prenom' => 'Joaquin',
            'pays' => 'USA',
            'date_naissance' => '1974-10-28',
            'tel' => null
        ]);

        // 4. Création des Participations (Liaison film <-> acteur)
        // Attention : vos colonnes sont 'films_id' et 'acteur_id'
        DB::table('participations')->insert([
            ['films_id' => $idInception, 'acteur_id' => $idLeo, 'role' => 'Cobb'],
            ['films_id' => $idIntouchables, 'acteur_id' => $idOmar, 'role' => 'Driss'],
            ['films_id' => $idJoker, 'acteur_id' => $idPhoenix, 'role' => 'Arthur Fleck'],
        ]);
    }
}
