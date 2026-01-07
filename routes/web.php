<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('home', function () {
    return view('home')
;
})->name('p1');

Route::get('/user', [UserController::class, 'index']);


Route::get('user/{id}', function ($id) { return
'User '.$id; });
Route::get('test/{name?}', function ($name =
'Yasmine') { return $name; });

Route::get('accueil/{nom?}/{prenom?}',function ($nom='alami',$prenom='yasmine')
 { return view('accueil',['nom'=>$nom,'prenom'=>$prenom]);});

 Route::get('contact/{nom}/{prenom}',function(Request $request) {
return view('accueil',['nom'=>$request->nom,'prenom'=>$request->prenom]);
});

Route::view('/utilisateur', 'users');

Route::get('{n}', function($n) { return 'Je suis
la page ' . $n . ' !'; })->where('n', '[1-3]');;
