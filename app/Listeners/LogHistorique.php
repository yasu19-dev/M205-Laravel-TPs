<?php

namespace App\Listeners;

use App\Events\LivreUpdated;
use App\Models\Historique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;

class LogHistorique
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(LivreUpdated $event): void {
        // On récupère le livre depuis l'événement
        $livre = $event->livre;

        // On crée l'enregistrement dans la table historiques
        Historique::create([
            'livre_id' => $livre->id,
            'user_id' => Auth::id(), // ID de l'utilisateur connecté via Breeze
            'action' => "Le livre '{$livre->titre}' a été mis à jour.",
        ]);
}
}
