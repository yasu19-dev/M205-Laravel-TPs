<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FilmController extends Controller
{
    function index()
    {

    /////////////////////////////Exercice 1
        //1
 // $films=DB::table('films')->get();
 //2
 //$films=DB::table('films')->get(['titre']);
 //ou
 //$films = DB::table('films')->select('titre')->get();
 //ou
 //$films=DB::table('films')->pluck('titre');
//3
/*$films = DB::table('films')
    ->where('annee', '>', '2010-01-01')
    ->get(['titre', 'annee']);*/
    //ou
   // $films = DB::table('films')->where('annee', '>', '2010')->select('titre', 'annee')->get();

  // dd($films);
  //4
  /* $acteurs = DB::table('acteurs')
            ->where('nom', 'like', 'D%')
            ->get();
            dd($acteurs);*/
            //ou
          /*  $acteurs = DB::table('acteurs')
            ->where('nom', 'regexp', '^D')
            ->get();
            dd($acteurs);*/
//5
          /*  $films = DB::table('films')
                    ->where('duree', '>', '02:00:00') // 120 minutes en secondes
                    ->get();*/

        //dd($films);
//6
/*$films = DB::table('films')
                    ->whereBetween('annee', [2010, 2020])
                    ->get();

       dd($films);*/


    /////////////////////////////Exercice 2

    //1
   /*  $id = DB::table('films')->insertGetId([
            'titre' => 'Test',
            'pays' => 'France',
            'annee' => '2025',
            'duree' => '02:22:00',
            'genre' => 'Roman'
        ]);
        dd($id);*/
////////////////////Exercice 3
//1
/*$f= DB::table('films')->where('id',2 )->update(['titre' => 'TitreNv2']);
dd($f);*/
//2
/*DB::table('films')
        ->where('id', 2)
        ->update([
            'titre' => 'Titre Modifié',
            'pays' => 'Maroc'
        ]);--*/
//////////////////////Exercice 4
//1
//DB::table('films')->where('id', 7)->delete();
//2
//DB::table('films')->where('annee', '<', 2000)->delete();
//  return sview('films.index');
////////////////////Exercice 5
//1
/*$total_films = DB::table('films')->count();
dd  ($total_films);*/
//2
/*$avg_duree_films = DB::table('films')->avg(DB::table('films')->raw('TIME_TO_SEC(duree)'));
dd  ($avg_duree_films);*/
//3
 /* $moyenne = DB::table('films')->avg('annee');
  dd  ($moyenne);*/
//4
  $agregate = DB::table('participations')->where('acteur_id', 1)->count();
  dd  ($agregate);

  }
}
