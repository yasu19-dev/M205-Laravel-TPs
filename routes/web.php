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

// Route::get('/', function () {
//     return view('welcome');
// });

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
Route::get('/home1','App\Http\Controllers\HomeController@home');

// Route qui retourne une vue avec parametre passé dans un input dans la view welcome
Route::view('/index', 'welcome', ['id' => 100]);

// Route de redirection
Route::redirect('/test', '/index', 302);


// ------------------------- CONTROLLER -------------------------------
// Affichage dans une vue personalisée
Route::get('/somme{a}+{b}', 'App\Http\Controllers\CalculController@somme');

// Afiichage depuis le controller
Route::get('/produit{a}*{b}', 'App\Http\Controllers\CalculController@produit');


// route vue/controller
Route::get('vue2','App\Http\Controllers\CalculController@testvue');

// route TP1
Route::get('/affichage', 'App\Http\Controllers\ControllerTP1@etudiant');

// ------------------------------- VIEW --------------------------------------------

// route vue imbriqué (vue crée dans un sous dossier)
Route::get('/profil', function(){
    return view('admin.profile');
});

//  Utilisation de view() avec tableau associatif
Route::get('/bonjour', function(){
    $name = 'Yasmine';
    return view('vue',['name'=>$name, 'date'=> date('d/m/Y')]);
});

// Utilisation de with()
Route::get('/bienvenue', function() {
    $name = 'Zaid';
    return view('vue')->with('name',$name)->with('date', date('d/m/Y'));
});

// Utilsation de compact dans Controller
Route::get('/details/{id}/{name}/{pass}', 'App\Http\Controllers\StudentController@display');

// Structure de controle
Route::get('/structure', function(){
    $note = 15.02;
    $nom = 'Harroudi';
    $prenom = 'Yasmine';
    $age = 25;
    $produit = 'montre';
    return view('structure', ['note'=> $note, 'nom'=> $nom, 'prenom'=>$prenom, 'age'=>$age, 'produit'=>$produit]);
});

// ------------BLADE TEMPLATE ----------

Route::get('/contact1', function(){
    return view("bladeTemplate.contact");
});

Route::get('/about', function(){
    return view("bladeTemplate.about");
});


// TP 2 BLADE TEMPLATE
Route::get('/home', function () {
    return view('pages.home');
})->name('home');

Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');

Route::get('/conditions', function () {
    return view('pages.conditions');
})->name('conditions');

Route::get('/loops', function () {
    return view('pages.loops');
})->name('loops');


// ---------- BLADE COMPONENT -----------

Route::get('/bladecomponent', function(){
    return view('accueil');
}
);
