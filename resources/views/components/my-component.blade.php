@props(["etudiants"])

<div>
    <table class="table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Note</th>
            </tr>
        </thead>
        <tbody>
            @foreach($etudiants as $etudiant)
                <tr>
                    <td>{{ $etudiant['nom'] }}</td>
                    <td>{{ $etudiant['note'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
