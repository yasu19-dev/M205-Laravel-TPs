<?php
namespace App\Listeners;

use App\Events\ActionEffectuee;
use App\Models\Historique;
use Illuminate\Support\Facades\Auth;

class EnregistrerHistorique
{
    public function handle(ActionEffectuee $event): void
    {
        Historique::create([
            'nom_table' => $event->modele->getTable(), // Récupère auto "produits" ou "commandes"
            'user_id'   => Auth::id(),                 // L'ID de l'user connecté (ou null)
            'operation' => $event->action,
            'date'      => now(),
        ]);
    }
}
