<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    protected $fillable = ['date', 'client_id'];

    // Relation : Une commande appartient à un seul client
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    // Relation : Une commande contient plusieurs produits
    public function produits()
    {
        return $this->belongsToMany(Produit::class, 'commande_produit')
                    ->withPivot('qte_cmd')
                    ->withTimestamps();
    }
}
