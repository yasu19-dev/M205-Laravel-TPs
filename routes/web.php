<?php

use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function ()
{ return 'Bonjour Laravel'; });

Route::get('/accueil', function () {
    return view('accueil');
});

Route::get('/test', [TestController::class, 'index']);
Route::get('/test', [TestController::class, 'show']);

Route::view('/view', 'accueil')->name('accueil');;
Route::view('/test2', 'test');
Route::get('/home/{nom}', function ($nom) {
    return 'Bonjour ' . $nom;
});
Route::get('/home/{nom}/{age}', function ($nom, $age) {
    return "Bonjour $nom votre Age est $age ans";
});
Route::get('/home3/{nom}/{age?}', function ($nom, $age = null) {
    if ($age) {
        return "Bonjour $nom votre Age est $age ans";
            }
    return "Bonjour $nom";
});

