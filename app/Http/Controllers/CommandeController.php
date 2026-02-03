<?php
namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Commande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // IMPORTANT

class CommandeController extends Controller
{
    public function index()
    {
        $commandes = Commande::all();
        return view('commandes.index', compact('commandes'));
    }

    public function create()
    {
        return view('commandes.create');
    }

    // SAVE : Enregistrement avec Image
    public function store(Request $request)
    {
        // 1. Validation (Optionnel mais recommandé)
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // ou 'file' pour tout type
        ]);

        $input = $request->all();

        // 2. Traitement de l'upload
        if ($request->hasFile('image')) {
            // Stocke le fichier dans le dossier 'storage/app/public/commandes'
            // et retourne le chemin hashé
            $path = $request->file('image')->store('commandes', 'public');
            $input['image'] = $path;
        }

        Commande::create($input);

        return redirect()->route('commandes.index')
            ->with('success', 'Commande ajoutée avec image !');
    }

    public function edit(Commande $commande)
    {
        return view('commandes.edit', compact('commande'));
    }

    // UPDATE : Modification avec remplacement d'image
    public function update(Request $request, Commande $commande)
    {
        $input = $request->all();

        if ($request->hasFile('image')) {
            // 1. Supprimer l'ancienne image si elle existe
            if ($commande->image) {
                Storage::disk('public')->delete($commande->image);
            }

            // 2. Uploader la nouvelle
            $path = $request->file('image')->store('commandes', 'public');
            $input['image'] = $path;
        } else {
            // Si pas de nouvelle image, on garde l'ancienne (ne pas écraser par null)
            unset($input['image']);
        }

        $commande->update($input);

        return redirect()->route('commandes.index')
            ->with('success', 'Commande modifiée !');
    }

    public function destroy(Commande $commande)
    {
        // Supprimer l'image du disque avant de supprimer la ligne en BD
        if ($commande->image) {
            Storage::disk('public')->delete($commande->image);
        }

        $commande->delete();
        return redirect()->route('commandes.index');
    }

    // DOWNLOAD : Télécharger le fichier
    public function download($id)
    {
        $commande = Commande::findOrFail($id);

        if (!$commande->image) {
            return back()->with('error', 'Aucun fichier associé.');
        }
    // On construit le chemin complet vers le dossier 'public/storage'
        $path = public_path('storage/' . $commande->image);

        return response()->download($path);
    }

    public function search(Request $request)
    {
        // 1. On prépare la requête (sans l'exécuter tout de suite)
        // On utilise 'with' pour charger les infos du client (optimisation)
        $query = Commande::with('client');

        // 2. Si un client est sélectionné dans le formulaire
        if ($request->has('client_id') && $request->client_id != '') {
            $query->where('client_id', $request->client_id);
        }

        // 3. On exécute la requête avec pagination (10 par page)
        $commandes = $query->paginate(10);

        // 4. On récupère la liste de tous les clients pour le menu déroulant
        $clients = Client::all();

        // 5. On retourne la vue (on peut réutiliser index ou créer une vue search)
        return view('commandes.search', compact('commandes', 'clients'));
    }


}
