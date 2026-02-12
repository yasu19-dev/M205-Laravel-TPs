<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodosController;

/*
|--------------------------------------------------------------------------
| Routes de l'application
|--------------------------------------------------------------------------
*/

// 1. Route pour afficher tous les todos
// Méthode: index
Route::get('/todos', [TodosController::class, 'index']);

// 2. Route pour afficher les todos de l'utilisateur connecté
// Méthode: byUserId
Route::get('/todos/user', [TodosController::class, 'byUserId']);

// 3. Route pour créer un nouveau todo
// Méthode: store
Route::post('/todos', [TodosController::class, 'store']);

// 4. Route pour afficher un seul todo spécifique
// Méthode: show
Route::get('/todos/{id}', [TodosController::class, 'show']);

// 5. Route pour mettre à jour un todo
// Méthode: update
Route::put('/todos/{id}', [TodosController::class, 'update']);

// 6. Route pour supprimer un todo
// Méthode: delete
Route::delete('/todos/{id}', [TodosController::class, 'delete']);


/*
|--------------------------------------------------------------------------
| Route de TEST RAPIDE (Simulation)
|--------------------------------------------------------------------------
| Si vous voulez tester la journalisation en un seul clic sans formulaire,
| lancez cette route : /test-logs
*/
Route::get('/test-logs', function () {
    // On simule manuellement quelques logs pour vérifier que mon_fichier.log fonctionne
    Illuminate\Support\Facades\Log::channel('mon_fichier')->info('TEST: Début du test manuel via la route /test-logs');
    Illuminate\Support\Facades\Log::channel('mon_fichier')->warning('TEST: Ceci est un avertissement de test');
    Illuminate\Support\Facades\Log::channel('mon_fichier')->error('TEST: Ceci est une erreur de test');

    return 'Logs de test envoyés ! Vérifiez storage/logs/mon_fichier.log';
});
