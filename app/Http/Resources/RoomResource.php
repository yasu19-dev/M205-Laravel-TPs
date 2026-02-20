<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RoomResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'identifiant' => $this->id, // Identifiant de la chambre [cite: 39]
            'nom' => $this->name, // Le nom (déjà en majuscules via le mutator) [cite: 40]
            'type' => $this->type, // Type de chambre [cite: 41]
            'prix_formate' => $this->formatted_price, // Le prix formaté via l'accessor [cite: 42]
            'statut' => ucfirst($this->status), // Le statut lisible (Disponible ou Occupé) [cite: 43]
        ];
    }
}
