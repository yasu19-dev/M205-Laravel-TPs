<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Commande;
use App\Models\Produit;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    // --- PARTIE 1 : LISTE ET RECHERCHE (Q7, Q9, Q17) ---
    public function index(Request $request)
    {
        // On prépare la requête (avec 'client' et 'produits' pour l'affichage)
        $query = Commande::with(['client', 'produits']);

        // Gestion de la recherche par Client (Question 17)
        if ($request->has('search_client')) {
            $nom = $request->search_client;
            // On cherche dans la table 'clients' liée
            $query->whereHas('client', function($q) use ($nom) {
                $q->where('nom', 'like', "%$nom%");
            });
        }

        // Pagination de 10 par page (Question 9)
        $commandes = $query->orderBy('date', 'desc')->paginate(10);

        // On récupère aussi les produits pour pouvoir en ajouter plus tard
        $allProduits = Produit::all();

        return view('commandes.index', compact('commandes', 'allProduits'));
    }

    // --- PARTIE 2 : AJOUT ET MODIFICATION (Q7, Q10, Q11, Q13) ---

    // Formulaire de création (Q10)
    public function create()
    {
        $clients = Client::all();
        return view('commandes.create', compact('clients'));
    }

    // Enregistrement (Q7 + Validation Q13)
    public function store(Request $request)
    {
        $request->validate(['client_id' => 'required', 'date' => 'required']);
        Commande::create($request->all());
        return redirect()->route('commandes.index');
    }

    // Formulaire de modification (Q11)
    public function edit($id)
    {
        $commande = Commande::find($id);
        $clients = Client::all();
        return view('commandes.edit', compact('commande', 'clients'));
    }

    // Mise à jour (Q7 + Validation Q13)
    public function update(Request $request, $id)
    {
        $request->validate(['client_id' => 'required', 'date' => 'required']);
        $commande = Commande::find($id);
        $commande->update($request->all());
        return redirect()->route('commandes.index');
    }

    // --- PARTIE 3 : SUPPRESSION (Q7, Q12) ---

    // Page de confirmation (Q12)
    public function deleteConfirmation($id)
    {
        $commande = Commande::find($id);
        return view('commandes.delete', compact('commande'));
    }

    // Action de supprimer (Q7)
    public function destroy($id)
    {
        Commande::destroy($id);
        return redirect()->route('commandes.index');
    }
// --- PARTIE 4 : FONCTIONS AVANCÉES ---

    // Ajouter un produit à une commande existante (Question 15)
    public function addProduct(Request $request, $id)
    {
        $commande = Commande::find($id);

        // On attache le produit à la commande (Table pivot)
        $commande->produits()->attach($request->produit_id, [
            'qte_cmd' => $request->qte_cmd
        ]);

        return back(); // On revient sur la même page
    }

    // Page de Statistiques et Recherche Produit (Questions 16 et 19)
    public function stats(Request $request)
    {
        // 1. Calculer le nombre de commandes par client (Q16)
        $clientsStats = Client::withCount('commandes')->get();

        // 2. Recherche de produits (Q19)
        $produits = Produit::query();

        if ($request->has('search_produit')) {
            $produits->where('nom', 'like', '%' . $request->search_produit . '%');
        }

        return view('commandes.stats', [
            'clientsStats' => $clientsStats,
            'produits' => $produits->get()
        ]);
    }
} // Fin de la classe CommandeController
