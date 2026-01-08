<?php

use App\Http\Controllers\BaseController;
use App\Http\Controllers\InvokeController;
use App\Http\Controllers\RessourceController;
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

Route::get('/one', [BaseController::class, 'oneMethode']);
Route::get('/index', [BaseController::class, 'index']);
Route::get('/afficher/{nom}/{age}', [BaseController::class, 'Afficher']);
Route::get('/oneAction', InvokeController::class);
Route::resource('MaRessource', RessourceController::class);
