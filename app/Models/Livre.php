<?php

namespace App\Models;

use App\Events\LivreUpdated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livre extends Model
{
    use HasFactory;
    protected $fillable = ['titre', 'annee_publication', 'nombre_pages', 'auteur_id'];

    // Q28 : On indique que l'événement LivreUpdated doit être déclenché à chaque mise à jour d'un livre
    protected $dispatchesEvents = [
        'updated' => LivreUpdated::class,
    ];


    public function auteur()
        { return $this->belongsTo(Auteur::class); }
    public function emprunts()
        { return $this->hasMany(Emprunt::class); }
    }
