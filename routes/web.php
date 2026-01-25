<?php

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

// ---------------------------- ROUTAGE ------------------------------------

//Route nommée
Route::get('/accueil', function(){
    return view('home');
})->name("accueil");

// Parametre obligatoire
Route::get('user/{id}', function(int $id){
    return 'User '.$id;
});

//Parametre facultatif on utilise ? et on definit la valeur par defaut
Route::get('utilisateur/{name?}', function($name = 'Yasmine'){
    return 'Utilisateur est: '.$name ;
});

// Route avec appel des méthodes du controlleur
Route::get('/home','App\Http\Controllers\HomeController@home');

// Route qui retourne une vue avec parametre passé dans un input dans la view welcome
Route::view('/index', 'welcome', ['id' => 100]);

// Route de redirection
Route::redirect('/test', '/index', 302);


// ------------------------- CONTROLLER -------------------------------
// Affichage dans une vue personalisée
Route::get('/somme{a}+{b}', 'App\Http\Controllers\CalculController@somme');

// Afiichage depuis le controller
Route::get('/produit{a}*{b}', 'App\Http\Controllers\CalculController@produit');

//  route vue
Route::get('/vue', function(){
    return view('vue');
});

// route vue/controller
Route::get('vue2','App\Http\Controllers\CalculController@testvue');

