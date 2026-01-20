<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{
    use HasFactory;
      protected $guarded=[];
     public function stagiaires()
  {
    return $this->hasMany(Stagiaire::class);
  }
   public function modules()
    {
      return $this->belongsToMany(Module::class)
      ->withPivot('masse_horaire')
      ->withTimestamps();
    }
}
