<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GestionController extends Controller
{
    public function calcul($nombre) 
    {
        if (!view()->exists('calcul')) {
            abort(404);
        }
        return view('calcul',['nombre'=>$nombre]);
    }
        public function moyenne($nom,$note)
        {
            return view('moyenne')
                    ->with('nom', $nom)
                    ->with('note',$note);
        }
        public function notes()
        {
            $etudiants = [
                ['nom' => 'Ahmed', 'note' => 15],
                ['nom' => 'Mohamed', 'note' => 9],
                ['nom' => 'Khadija', 'note' => 12],
                ['nom' => 'Adam', 'note' => 18],
        ];
            return view('notes',compact('etudiants'));
        }
    }
    
