<?php

use App\Http\Controllers\GestionController;
use Illuminate\Support\Facades\Route;

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
Route::get('/calcul/{nombre}',[GestionController::class,'calcul']);
Route::get('/moyenne/{nom}/{note}', [GestionController::class, 'moyenne']);
Route::get('/notes', [GestionController::class, 'notes']);