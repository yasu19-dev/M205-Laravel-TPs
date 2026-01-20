<h1>Détails Stagiaire</h1>
<div>
    <p>Id : {{$stagiaire['id']}}</p>
    <p>Nom :{{$stagiaire['nom']}}</p>
    <p>Prénom :{{$stagiaire['prenom']}}</p>
    <p>Age :{{$stagiaire['age']}}</p>
    <p>Id Groupe :{{$stagiaire->groupe->id}}</p>
    <p>Nom Groupe :{{$stagiaire->groupe->nom}}</p>
  {{-- relation one to many --}}
    <h1>Liste des stagiaires du groupe num: {{$stagiaire->groupe->id}}</h1>
<table>
    <tr>
        <th>Id</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Age</th>
    </tr>

    @foreach($stagiaire->groupe->stagiaires as $stagiaire)
    <tr>
         <td>{{$stagiaire['id']}}</td>
         <td>{{$stagiaire['nom']}}</td>
         <td>{{$stagiaire['prenom']}}</td>
         <td>{{$stagiaire['age']}}</td>
        </tr>
        @endforeach
</table>
  {{-- relation many to many --}}
<h1>Liste des modules du groupe num: {{$stagiaire->groupe->id}}</h1>
<table>
    <tr>
        <th>Id</th>
        <th>Intitule</th>
        <th>Masse horraire</th>
        <th>Nbr de groupes</th>

    </tr>
    @foreach($stagiaire->groupe->modules as $module)
    <tr>
         <td>{{$module['id']}}</td>
         <td>{{$module['intitule']}}</td>
         <td>{{$module->pivot->masse_horaire}}</td>
         <td>{{$module->groupes->count()}}</td>
        </tr>
        @endforeach
</table>

</div>



