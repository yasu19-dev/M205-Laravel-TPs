<?php

use App\Http\Controllers\AuthTestController;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



// Auth Test Route

Route::get('/auth-test', [AuthTestController::class, 'index'])->name('auth.test');

// Formulaire manuel
Route::get('/auth-manual-login', function () {
    return view('auth-test.login');
})->name('auth.manual.login.form');

// Traitement de la connexion manuelle
Route::post('/auth-manual-login', function (HttpRequest $request) {
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) { // Tente de connecter l'utilisateur
        return redirect()->intended('/auth-test');
    }

    return back()->withErrors(['email' => 'Connexion échouée']);
})->name('auth.manual.login');

// Déconnexion [cite: 88, 89]
Route::get('/auth-logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('auth.logout');

// Protection par Middleware [cite: 96, 98]
Route::get('/profil', function () {
    return 'Profil utilisateur de : ' . Auth::user()->name;
})->middleware('auth');

// attempt
Route::post('/login-custom', function (Request $request) {
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        // Succès : redirection vers le tableau de bord
        return redirect()->intended('home');
    }

    // Échec : retour au formulaire avec erreur
    return back()->withErrors(['email' => 'Identifiants incorrects']);
});

// logout
Route::get('/logout-test', function () {
    Auth::logout();
    return redirect('/login');
});

// Middleware auth
Route::get('/profil', function () {
    return 'Bienvenue sur votre profil, ' . Auth::user()->name;
})->middleware('auth');
