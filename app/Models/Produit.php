<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // 1. Importer la classe

class Produit extends Model
{
    use HasFactory, SoftDeletes; // 2. Utiliser le Trait

    protected $fillable = ['nom', 'qte_stock', 'prix'];

    // Pour que 'deleted_at' soit traité comme une date (automatique en Laravel récent, mais bonne pratique)
    protected $dates = ['deleted_at'];
}
