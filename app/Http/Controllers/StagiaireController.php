<?php

namespace App\Http\Controllers;

use App\Models\Stagiaire;
use Illuminate\Http\Request;

class StagiaireController extends Controller
{
    public function index()
    {
        $stagiaire = Stagiaire::find(1);
        return view('stagiaires.index', compact('stagiaire'));
    }
    public function test()
    {
         $stagiaire = Stagiaire::find(3);
        //insérer une ligne dans la table groupe_module
 //  $stagiaire->groupe->modules()->attach(2,['masse_horaire'=>40]);
   //insérer plusieurs lignes dans la table groupe_module
   // $stagiaire->groupe->modules()->attach([1=>['masse_horaire'=>30],3=>['masse_horaire'=>10]]);
      //supprimer une ligne dans la table groupe_module
    $stagiaire->groupe->modules()->detach(2);

    }
}
