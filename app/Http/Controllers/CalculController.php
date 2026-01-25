<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculController extends Controller
{
    public function somme (int $a,$b){
        $somme = $a + $b;
        return  view('somme', ['s' => $somme] );
    }

    public function produit (int $a,$b){
        $produit = $a * $b;
        return 'Le produit est : '.$produit;
    }

    public function testvue(){
        return view('vue');
    }
}
