<?php
use App\Http\Controllers\CommandeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () { return redirect()->route('commandes.index'); });

// Routes spécifiques
Route::get('/commandes/stats', [CommandeController::class, 'stats'])->name('commandes.stats');
Route::get('/commandes/{id}/delete', [CommandeController::class, 'deleteConfirmation'])->name('commandes.delete_confirm');
Route::post('/commandes/{id}/add-product', [CommandeController::class, 'addProduct'])->name('commandes.add_product');

// Routes CRUD automatiques
Route::resource('commandes', CommandeController::class);
