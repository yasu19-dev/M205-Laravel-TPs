<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Stmt\GroupUse;

class Stagiaire extends Model
{
    use HasFactory;
   // protected $fillable=['nom', 'prenom', 'age'];
    protected $guarded = [];
}
