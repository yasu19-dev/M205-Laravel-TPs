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
            ->get();+
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
/*  $agregate = DB::table('participations')->where('acteur_id', 1)->count();
  dd  ($agregate);*/
  /////////////////Ecercice 6
  //1
//$films = DB::table('films')->limit(3)->offset(2)->get();
//$films = DB::table('films')->paginate(3);
//2
   // $films = DB::table('films')->paginate(3, ['*'], 'page', 2);

   // $films = DB::table('films')->paginate(3, ['id','titre'], 'page', 2);
/*$films = DB::table('films')->limit(3)->offset(3)->get();//ofsset=nbpage*(numPage-1)
   dd($films);*/
////////////////////Exercice 7
//1
/* $films = DB::table('participations')
            ->join('films', 'participations.films_id', '=', 'films.id')
            ->join('acteurs', 'participations.acteur_id', '=', 'acteurs.id')
            ->select('films.titre', 'acteurs.nom', 'acteurs.prenom')
            ->get();
               dd($films);
               */
//2
/*$acteur_action = DB::table('acteurs')->join('participations' , 'acteurs.id' , '=' , 'acteur_id')->join('films' , 'films.id' , '=' , 'films_id' )->where('films.genre' , '=' , 'Action')->select(
            'acteurs.nom as acteur_nom' , 'acteurs.prenom as acteur_pr'
        )->distinct()->get() ;

dd($acteur_action);*/
//3
/*$resultats = DB::table('participations')
        ->join('films', 'films.id', '=', 'participations.films_id')
        ->join('acteurs', 'acteurs.id', '=', 'participations.acteur_id')
        ->select('films.titre', 'acteurs.nom', 'acteurs.prenom', 'participations.role')
        ->get();
        dd($resultats);*/
        //4
       /*  $resultats= DB::table('acteurs')
            ->leftJoin('participations', 'acteurs.id', '=', 'participations.acteur_id')
            ->whereNull('participations.films_id')
            ->select('acteurs.*')
            ->get();
            dd($resultats);*/
//5
      /*      $resultats = DB::table('participations')
            ->join('films', 'participations.films_id', '=', 'films.id')
            ->select('films.id','films.titre', DB::raw('count(*) as total_acteurs'))
            ->groupBy('films.id', 'films.titre')
            ->having('total_acteurs', '>', 1)
            ->get();*/
          /*        $resultats = DB::table('participations')
            ->join('films', 'participations.films_id', '=', 'films.id')
            ->selectRaw ('films.id,films.titre,count(*) as total_acteurs')
            ->groupBy('films.id', 'films.titre')
            ->having('total_acteurs', '>', 1)
            ->get();*/
           /* $resultats = DB::table('participations')
            ->join('films', 'participations.films_id', '=', 'films.id')
            ->select ('films.id','films.titre')
            ->groupBy('films.id', 'films.titre')
            ->havingRaw('count(*)>1')
            ->get();
             dd($resultats);*/
             //6
           /*  $participation_entre_date = DB::table('acteurs')
        ->join('participations' , 'acteurs.id' , '=' , 'acteur_id')
        ->join('films' , 'films_id' , '=' , 'films.id')
        ->select('acteurs.nom' , 'acteurs.prenom')
        ->whereBetween('films.annee', [2010,2020])->get();
        dd($participation_entre_date);*/

        ///////////////////Tests
  //orWhere
   /*     $films = DB::table('films')
    ->where('genre', 'Action')
    ->orWhere('genre', 'Comédie')
    ->get();
    dd($films);*/

//whereIn
  /*  $films = DB::table('films')
    ->whereIn('id', [1, 2, 5])
    ->get();
        dd($films);*/

//orderBy
 /*  $films = DB::table('films')
    ->orderBy('titre', 'asc')
    ->get();
    dd($films);*/

    //find
/*$film = DB::table('films')->find(5);
dd($film);*/

//inRandomOrder
/*$film = DB::table('films')->inRandomOrder()->get();
dd($film);*/
//oldest
/*
//$oldest =DB::table('films')->oldest('annee')->get();//order by asc
$oldest =DB::table('films')->oldest()->get();//order by created_at asc
dd($oldest);*/

/*$newest = DB::table('films')->latest()->first(); // ORDER BY created_atDESC
dd($newest);*/
//$oldest = DB::table('users')->oldest()->first(); // ORDER BY created_at ASC

//union
/*
$oldest =DB::table('films')->oldest()->limit(2);//order by created_at asc
$newest = DB::table('films')->latest()->limit(2); // ORDER BY created_atDESC
        $tous = $oldest->union($newest)
        ->get();
        dd($tous);*/

        //updateOrInsert
       /* DB::table('films')->updateOrInsert(
        ['titre' => 'Avatar 2'],
        ['pays' => 'Maroc', 'annee' => 2024,'duree'=>'02:00:00', 'genre' => 'Sci-Fi']

    );*/
   /*
    //$films = DB::table('films')->offset(2)->limit(3)->get();
    $films = DB::table('films')->skip(2)->take(3)->get();

    dd($films);*/

  }

}
