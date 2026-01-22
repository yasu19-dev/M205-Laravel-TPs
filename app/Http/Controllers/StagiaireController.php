<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //Methode 1
use Illuminate\Support\Facades\Validator; //Methode 2
use App\Http\Requests\StagiaireRequest; //Methode 3


class StagiaireController extends Controller
{
    public function create() {
        return view('stagiaire.create');
    }
    // -------------- METHODE 1 ------------------
    // public function insert(Request $request) {
    //     // Syntaxe basique du cours
    //     $request->validate([
    //         'nom' => 'required|unique:stagiaires',
    //         'prenom' => 'required|min:2|max:40',
    //         'age' => 'required|numeric|between:17,30'
    //     ]);

    //     // Insertion (si validation passe)
    //     DB::table('stagiaires')->insert([
    //         'nom' => $request->nom,
    //         'prenom' => $request->prenom,
    //         'age' => $request->age
    //     ]);

    //     return "Stagiaire ajouté avec succès (Méthode 1)";
    // }

    // -------------- METHODE 2 ------------------

        // public function insert(Request $request) {
        //     $rules = [
        //         'nom' => ['required', 'unique:stagiaires'],
        //         'age' => ['required', 'numeric', 'between:17,30']
        //     ];

        //     $messages = [
        //         'nom.required' => 'le nom est obligatoire',
        //         'age.between' => 'age est entre 17 et 30'
        //     ];

        //     $validator = Validator::make($request->all(), $rules, $messages); // [cite: 65]

        //     if ($validator->fails()) {
        //         return redirect()->back()
        //             ->withErrors($validator)
        //             ->withInput();
        //     }

        //     // Logique d'insertion ici...
        //     return "Validé avec Facade Validator";
        // }

    // -------------- METHODE 3 ------------------

        public function insert(StagiaireRequest $request) {
            // Le code ici ne s'exécute que si la validation passe
            return "Validé via StagiaireRequest !";
        }
}

