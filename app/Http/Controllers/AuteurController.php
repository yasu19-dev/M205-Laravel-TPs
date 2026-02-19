<?php

namespace App\Http\Controllers;

use App\Models\Auteur;
use Illuminate\Http\Request;

class AuteurController extends Controller
{
    // 1. Afficher la liste des auteurs
    public function index()
    {
        $auteurs = Auteur::all();
        return view('auteurs.index', compact('auteurs'));
    }

    // 2. Afficher le formulaire pour ajouter un auteur
    public function create()
    {
        return view('auteurs.create');
    }

    // 3. Sauvegarder le nouvel auteur dans la BDD
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
        ]);


        Auteur::create($request->all());


        return redirect()->route('auteurs.index');
    }

    // 4. Afficher le formulaire pour modifier un auteur existant
    public function edit(Auteur $auteur)
    {
        return view('auteurs.edit', compact('auteur'));
    }

    // 5. Mettre à jour l'auteur dans la BDD
    public function update(Request $request, Auteur $auteur)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
        ]);

        $auteur->update($request->all());

        return redirect()->route('auteurs.index');
    }

    // 6. Supprimer l'auteur
    public function destroy(Auteur $auteur)
    {
        $auteur->delete();

        return redirect()->route('auteurs.index');
    }
}
