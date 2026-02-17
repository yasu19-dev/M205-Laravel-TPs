<?php
namespace App\Events;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ActionEffectuee
{
    use Dispatchable, SerializesModels;

    public Model $modele; // On type-hint "Model" pour accepter Produit ET Commande
    public string $action;

    public function __construct(Model $modele, string $action)
    {
        $this->modele = $modele;
        $this->action = $action;
    }
}
