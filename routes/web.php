<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test-tp', function () {
    // Sélectionnez tous les films
        $films = DB::table('films')->get();
    // Sélectionnez tous les films et affichez leurs titres.
        $titres = DB::table('films')->select('titre')->get();
    // Films sortis après une date (année) spécifique.  Adaptation : Votre table a un champ annee, donc on filtre par année.
        $filmsRecents = DB::table('films')
            ->where('annee', '>', 2010)
            ->select('titre', 'annee')
            ->get();
    // Acteurs dont le nom commence par "D"
        $acteursD = DB::table('acteurs')
            ->where('nom', 'like', 'D%')
            ->get();
    // Films dont la durée est supérieure à 120 minutes.  Adaptation : Votre champ duree est de type TIME. 120 min = 02:00:00.
        $filmsLongs = DB::table('films')
            ->where('duree', '>', '02:00:00')
            ->get();
    // Films sortis entre deux dates (années).
        $filmsPeriode = DB::table('films')
            ->whereBetween('annee', [2000, 2020])
            ->get();
    // Insertion de Films
        DB::table('films')->insert([
            'titre' => 'The Dark Knight',
            'pays' => 'USA',
            'annee' => 2008,
            'duree' => '02:32:00',
            'genre' => 'Action'
        ]);
    // Insérez plusieurs films.
        DB::table('films')->insert([
            ['titre' => 'Parasite', 'pays' => 'Corée', 'annee' => 2019, 'duree' => '02:12:00', 'genre' => 'Thriller'],
            ['titre' => 'Amélie', 'pays' => 'France', 'annee' => 2001, 'duree' => '02:02:00', 'genre' => 'Comédie']
        ]);
    // Modifiez le titre d'un film existant.
        DB::table('films')
            ->where('id', 1)
            ->update(['titre' => 'Inception (Remastered)']);

    // Mettez à jour titre et pays (description n'existe pas dans votre schéma)
        DB::table('films')
            ->where('id', 1)
            ->update([
            'titre' => 'Inception Final Cut',
            'pays' => 'USA/UK'
        ]);

    // Mettez à jour l'année des films sortis avant une date
        DB::table('films')
            ->where('annee', '<', 2000)
            ->update(['annee' => 1999]);

    // Supprimez un film spécifique.
        DB::table('films')->where('id', 3)->delete();

    // Supprimez tous les films sortis avant une date (année) spécifique.
        DB::table('films')->where('annee', '<', 1980)->delete();

    // Nombre total de films.
        $total = DB::table('films')->count();

    // Moyenne des durées.
        $avgDuree = DB::table('films')
                        ->select(DB::raw('SEC_TO_TIME(AVG(TIME_TO_SEC(duree))) as moyenne_duree'))
                        ->first();
    // Moyenne des années de sortie.
        $avgAnnee = DB::table('films')->avg('annee');

    // Comptez le nombre de films pour un acteur donné.
        $nbFilms = DB::table('participations')
                        ->where('acteur_id', 1)
                        ->count();

    //Films par page (limite 10)
        $filmsPages = DB::table('films')->paginate(10);

    // Films avec les noms de leurs acteurs.  Attention aux noms de clés : films_id et acteur_id dans participations
        $filmsAvecActeurs = DB::table('films')
                                ->join('participations', 'films.id', '=', 'participations.films_id')
                                ->join('acteurs', 'participations.acteur_id', '=', 'acteurs.id')
                                ->select('films.titre', 'acteurs.nom', 'acteurs.prenom')
                                ->get();

    // Acteurs ayant participé à un film "Action"
        $acteursAction = DB::table('acteurs')
                                ->join('participations', 'acteurs.id', '=', 'participations.acteur_id')
                                ->join('films', 'participations.films_id', '=', 'films.id')
                                ->where('films.genre', 'Action')
                                ->select('acteurs.nom', 'acteurs.prenom')
                                ->distinct()
                                ->get();

    // Acteurs qui n'ont pas encore participé à un film.
        $acteursChomeurs = DB::table('acteurs')
                                ->leftJoin('participations', 'acteurs.id', '=', 'participations.acteur_id')
                                ->whereNull('participations.films_id')
                                ->select('acteurs.*')
                                ->get();

    // Films avec plus de 3 acteurs (participations).
        $grosCasting = DB::table('films')
                            ->join('participations', 'films.id', '=', 'participations.films_id')
                            ->select('films.titre', DB::raw('count(participations.acteur_id) as total_acteurs'))
                            ->groupBy('films.id', 'films.titre') // ID requis pour le group by strict
                            ->having('total_acteurs', '>', 3)
                            ->get();

    // Acteurs ayant participé à des films entre 2010 et 2020.
        $acteursDecennie = DB::table('acteurs')
                            ->join('participations', 'acteurs.id', '=', 'participations.acteur_id')
                            ->join('films', 'participations.films_id', '=', 'films.id')
                            ->whereBetween('films.annee', [2010, 2020])
                            ->select('acteurs.nom')
                            ->distinct()
                            ->get();



    // --- Affichage ---
    dd($films, $titres, $filmsRecents, $acteursD, $filmsLongs, $filmsPeriode, $total, $avgDuree, $avgAnnee, $nbFilms, $filmsPages, $filmsAvecActeurs, $acteursAction, $acteursChomeurs, $grosCasting, $acteursDecennie);
});
