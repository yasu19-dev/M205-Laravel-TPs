<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerTP1 extends Controller
{
    public function etudiant(){
            $data=[];
            $data['nom']='HARROUDI';
            $data['prenom']='Yasmine';
            $data['poste']='Etudiante';
            $data['Modules']=['Gestion des Données','Développer en Backend','Projet de synthèse', 'React.js'];
            return view('affichage',$data);
}
}
