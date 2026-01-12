<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des notes</title>
</head>
<body>
    <h1>Résultats de la classe</h1>
    @if(empty($etudiants)) 
        <p>tableau vide</p>
    @else
        @php
            $nombreTotal = count($etudiants);
            $sommeNotes = array_sum(array_column($etudiants, 'note'));
            $moyenneClasse = $sommeNotes / $nombreTotal;
        @endphp
        <p>Nombre total des etudiants : <strong>{{ $nombreTotal }}</strong></p>
        <p>Moyenne de la classe : <strong>{{ number_format($moyenneClasse, 2) }} / 20</strong></p>
        <hr>
        <h2>etudiants avec une note superieure a la moyenne :</h2>
        <ul>
            @foreach($etudiants as $etudiant)
                @if($etudiant['note'] > $moyenneClasse)
                    <li>
                        {{ $etudiant['nom'] }} : {{ $etudiant['note'] }}
                    </li>
                @endif
            @endforeach
        </ul>
    @endif
</body>
</html>