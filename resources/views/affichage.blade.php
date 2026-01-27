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
        <tr>
            <td>Nom et Prenom</td>
            <td>{{ $nom }} {{$prenom }}</td>
        </tr>
        <tr>
            <td>Poste</td>
            <td>{{ $poste }}</td>
        </tr>
        <tr>
            <td>Modules</td>
            <td>
                <ul>
                    @foreach ($Modules as $module )
                        <li>{{ $module }}</li>
                    @endforeach
                </ul>
            </td>

        </tr>
    </table>
    
    {{-- Créer une vue qui contient une liste déroulante remplie par le nombre de 0 á 9 --}}
    <select name="" id="">
        @for ($i=0; $i<10; $i++)
            <option value="">{{ $i }}</option>
        @endfor
    </select>
    <br>
    {{-- Remplir une 2eme liste par les nombres impairs de 1 á 1000
        avec deux solutions:--}}

     {{-- Solution 1: avec boucle --}}
     <select name="" id="">
        @for ($i=1; $i<1000; $i+=2)
            <option value="">{{ $i }}</option>
        @endfor
     </select>
     <br>
     {{-- Solution 2: avec boucle et condition --}}
     <select name="" id="">
        @for ($i=1; $i<1000; $i++)
            @if ($i%2==1)
                <option value="">{{ $i }}</option>
            @endif
        @endfor
     </select>
</body>
</html>
