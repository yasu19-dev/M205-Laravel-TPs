<?php

namespace App\Http\Controllers;

use App\Models\Emprunt;
use App\Models\Livre;
use Illuminate\Http\Request;

class EmpruntController extends Controller
{
    /**
     * Question 20 : Afficher la liste des emprunts.
     * Question 22 : Utiliser les relations (Livre + Auteur).
     * Question 23 : Fonctionnalité de recherche par date.
     */
    public function index(Request $request)
    {
        // Q22 : On charge les relations 'livre' et l'auteur du livre pour éviter le problème N+1
        $query = Emprunt::with('livre.auteur');

        // Q23 : Filtrer les emprunts effectués entre deux dates si elles sont saisies dans la recherche
        if ($request->filled('date_debut') && $request->filled('date_fin')) {
            $query->whereBetween('date_emprunt', [$request->date_debut, $request->date_fin]);
        }

        $emprunts = $query->get();

        return view('emprunts.index', compact('emprunts'));
    }
    

    /**
     * Question 20 : Afficher le formulaire pour ajouter un nouvel emprunt.
     */
    public function create()
    {
        // On récupère tous les livres pour alimenter la liste déroulante (Q21)
        $livres = Livre::all();
        return view('emprunts.create', compact('livres'));
    }

    /**
     * Question 20 & 21 : Ajouter un nouvel emprunt avec validation.
     */
    public function store(Request $request)
    {
        // Q21 : Validation (date d'emprunt <= date de retour si cette dernière est remplie)
        $request->validate([
            'livre_id' => 'required|exists:livres,id',
            'date_emprunt' => 'required|date',
            'date_retour' => 'nullable|date|after_or_equal:date_emprunt',
        ]);

        Emprunt::create($request->all());

        return redirect()->route('emprunts.index');
    }

    /**
     * Question 20 : Afficher le formulaire pour modifier un emprunt existant.
     */
    public function edit(Emprunt $emprunt)
    {
        $livres = Livre::all();
        return view('emprunts.edit', compact('emprunt', 'livres'));
    }

    /**
     * Question 20 & 21 : Modifier un emprunt existant avec validation.
     */
    public function update(Request $request, Emprunt $emprunt)
    {
        // Q21 : La date d'emprunt doit toujours être inférieure ou égale à la date de retour
        $request->validate([
            'livre_id' => 'required|exists:livres,id',
            'date_emprunt' => 'required|date',
            'date_retour' => 'nullable|date|after_or_equal:date_emprunt',
        ]);

        $emprunt->update($request->all());

        return redirect()->route('emprunts.index');
    }

    /**
     * Question 20 : Supprimer un emprunt.
     */
    public function destroy(Emprunt $emprunt)
    {
        $emprunt->delete();

        return redirect()->route('emprunts.index');
    }
}
