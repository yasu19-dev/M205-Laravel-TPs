<?php

use App\Http\Controllers\AuteurController;
use App\Http\Controllers\EmpruntController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LivreController;


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
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

     // 1. Afficher la liste des livres
    Route::get('/livres', [LivreController::class, 'index'])->name('livres.index');

    // 2. Afficher le formulaire pour ajouter un livre
    Route::get('/livres/create', [LivreController::class, 'create'])->name('livres.create');

    // 3. Enregistrer le livre dans la base de données
    Route::post('/livres', [LivreController::class, 'store'])->name('livres.store');

    // 4. Afficher le formulaire pour modifier un livre spécifique (on passe l'ID ou l'objet)
    Route::get('/livres/{livre}/edit', [LivreController::class, 'edit'])->name('livres.edit');

    // 5. Mettre à jour le livre dans la base (PUT pour une modification complète)
    Route::put('/livres/{livre}', [LivreController::class, 'update'])->name('livres.update');

    // 6. Supprimer le livre
    Route::delete('/livres/{livre}', [LivreController::class, 'destroy'])->name('livres.destroy');


    Route::resource('livres', LivreController::class);
    Route::resource('auteurs', AuteurController::class);
    Route::resource('emprunts', EmpruntController::class);
});


require __DIR__.'/auth.php';
