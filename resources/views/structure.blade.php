<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table border="2">
        <tr><th>Nom</th>
            <th>Prenom</th>
            <th>Decision</th>
            <th>Age</th>
            <th>Produit</th>
        </tr>
        <tr>
            <td>{{ $nom }}</td>
            <td>{{ $prenom }}</td>
            <td>
                @if ( $note >=10)
                    <p>Admis.</p>
                @elseif ( $note>=0 )
                    <p>Redoublant</p>
                @else
                    <p>Erreur de saisie.</p>
                @endif
            </td>
            <td>
                 @switch($age)
                    @case( $age < 18 )
                    <p>La personne est mineure.</p>
                    @break
                    @case( $age > 18 )
                    <p>La personne est majeure.</p>
                    @break
                    @default
                    <p>valeur par défaut.</p>
                    @endswitch
            </td>
            <td>
                @isset($produit)
                <p>Le produit existe</p>
                 @endisset

            </td>
        </tr>
    </table>

</body>
</html>
