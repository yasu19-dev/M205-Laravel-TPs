<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StagiaireController;

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


Route::get('/stagiaire/create', [StagiaireController::class, 'create'])->name('stagiaire.create');
Route::post('/stagiaire/insert', [StagiaireController::class, 'insert'])->name('stagiaire.insert');
