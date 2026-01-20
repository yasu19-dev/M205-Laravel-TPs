<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;
      protected $guarded=[];
     public function groupes()
    {
      return $this->belongsToMany(Groupe::class)
      ->withPivot('masse_horaire')
      ->withTimestamps();
    }
}
