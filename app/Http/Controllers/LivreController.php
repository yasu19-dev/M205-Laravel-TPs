<?php

namespace App\Http\Controllers;

use App\Models\Auteur;
use App\Models\Livre;
use Illuminate\Http\Request;

class LivreController extends Controller
{
    public function index()
    {
        $livres = Livre::with('auteur')->paginate(10);
        return view('livres.index', compact('livres'));
    }

    public function create()
    {
        $auteurs = Auteur::all();
        return view('livres.create', compact('auteurs'));
    }

    public function store(Request $request) {

    $request->validate([
        'titre' => 'required',
        'annee_publication' => 'required|integer',
        'nombre_pages' => 'required|integer',
        'auteur_id' => 'required|exists:auteurs,id',
    ]);
    Livre::create($request->all());
    return redirect()->route('livres.index')->with('success', 'Livre ajouté');
}
public function edit(Livre $livre) {
    $auteurs = Auteur::all();
    return view('livres.edit', compact('livre', 'auteurs'));
}

public function update(Request $request, Livre $livre) {
    $request->validate(['titre' => 'required']);
    $livre->update($request->all());
    return redirect()->route('livres.index');
}

public function destroy(Livre $livre) {
    $livre->delete();
    return redirect()->route('livres.index');
}
}
