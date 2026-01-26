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
</body>
</html>
