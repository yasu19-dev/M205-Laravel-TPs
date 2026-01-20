<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'qte_stock', 'prix'];

    // Relation : Un produit peut être dans plusieurs commandes
    public function commandes()
    {
        return $this->belongsToMany(Commande::class, 'commande_produit')
                    ->withPivot('qte_cmd') 
                    ->withTimestamps();
    }
}
