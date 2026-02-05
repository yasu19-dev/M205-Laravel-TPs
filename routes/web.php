<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommandeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitController;

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

Route::get('commandes/download/{id}', [CommandeController::class, 'download'])
    ->name('commandes.download');


// Route de recherche
Route::get('commandes/search', [CommandeController::class, 'search'])->name('commandes.search');
Route::resource('commandes', CommandeController::class);



// Route corbeille
Route::get('produits/corbeille', [ProduitController::class, 'corbeille'])->name('produits.corbeille');

// Routes restore
Route::get('produits/restore/{id}', [ProduitController::class, 'restore'])->name('produits.restore');
Route::delete('produits/force/{id}', [ProduitController::class, 'forceDestroy'])->name('produits.forceDestroy');

// Routes ressource
Route::resource('produits', ProduitController::class);

// Routes d'authentification

Route::get('/inscription', [AuthController::class, 'inscription'])->name('inscription');
Route::post('/inscription', [AuthController::class, 'enregistrer'])->name('enregistrer');
Route::get('/login', [AuthController::class, 'formLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// --- Routes Protégées (Nécessite connexion) ---
Route::middleware(['custom.auth'])->group(function () {

    Route::get('/profil', [AuthController::class, 'profil'])->name('profil');

    // On protège toute la gestion des commandes et produits ici
    // Tu peux ajouter une vérification supplémentaire pour voir si c'est 'admin'
    Route::resource('commandes', CommandeController::class);
    Route::resource('produits', ProduitController::class);

});
