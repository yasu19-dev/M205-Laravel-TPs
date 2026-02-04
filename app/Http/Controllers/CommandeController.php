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
                        'client_id' => 'required|exists:clients,id',
                        'date' => 'required|date',
                        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
             // ou 'file' pour tout type
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


        }
            // 2. Uploader la nouvelle
                        $path = $request->file('image')->store('commandes', 'public');
                        $input['image'] = $path;
                    $commande->update($input);

        return redirect()->route('commandes.index')
            ->with('success', 'Commande modifiée !');
    }

    public function destroy(Commande $commande)
    {
        //soft delete pas besoin de supprimer l'image pour la restauration future
        // Supprimer l'image du disque avant de supprimer la ligne en BD
        // if ($commande->image) {
        //     Storage::disk('public')->delete($commande->image);
        // }

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

        $query = Commande::with('client');


        if ($request->has('client_id') && $request->client_id != '') {
            $query->where('client_id', $request->client_id);
        }

        // pagination (10 par page)
        $commandes = $query->paginate(10);


        $clients = Client::all();


        return view('commandes.search', compact('commandes', 'clients'));
    }


}
