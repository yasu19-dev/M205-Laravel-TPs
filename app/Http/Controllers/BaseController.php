<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    // Méthode index
    public function index() {
        return 'je suis le contrôleur BaseController';
    }

    // Méthode oneMethode
    // public function oneMethode() {
    //     return 'je suis la méthode oneMethode';
    // }
    public function oneMethode() {
        return view('accueil');
    }
    // Méthode afficher
    public function Afficher($nom, $age) {
        return view('afficher', ['nom' => $nom, 'age' => $age]);
}
}
