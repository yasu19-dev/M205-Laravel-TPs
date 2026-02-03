<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    // Affiche la liste des produits (ceux supprimés sont cachés automatiquement)
    public function index()
    {
        $produits = Produit::all();
        return view('produits.index', compact('produits'));
    }

 

    // Affiche la corbeille (uniquement les supprimés)
    public function corbeille()
    {
        $produits = Produit::onlyTrashed()->get();
        return view('produits.corbeille', compact('produits'));
    }

    // 1. SOFT DELETE (Suppression douce)
    public function destroy($id)
    {
        $produit = Produit::find($id);
        $produit->delete(); // Remplit juste 'deleted_at', ne supprime pas la ligne

        return redirect()->route('produits.index')
            ->with('success', 'Produit mis à la corbeille.');
    }

    // 2. RESTORE (Restaurer un produit supprimé)
    public function restore($id)
    {
        // On doit utiliser withTrashed() car find() ne trouve pas les supprimés par défaut
        $produit = Produit::withTrashed()->find($id);

        if($produit) {
            $produit->restore(); // Remet 'deleted_at' à NULL
        }

        return redirect()->route('produits.corbeille') // Ou vers index
            ->with('success', 'Produit restauré avec succès.');
    }

    // 3. FORCE DELETE (Suppression définitive)
    public function forceDestroy($id)
    {
        $produit = Produit::withTrashed()->find($id);

        if($produit) {
            $produit->forceDelete(); // Supprime physiquement la ligne SQL
        }

        return redirect()->route('produits.corbeille')
            ->with('success', 'Produit supprimé définitivement.');
    }
}
