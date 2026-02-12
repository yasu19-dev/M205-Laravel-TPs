
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détail Todo</title>
</head>
<body>
    <a href="/todos">← Retour au Dashboard</a>

    <h1>Modifier le Todo #{{ $todo->id }}</h1>

    <form action="/todos/{{ $todo->id }}" method="POST">
        @csrf
        @method('PUT') <div style="margin-bottom: 10px;">
            <label>Titre:</label><br>
            <input type="text" name="title" value="{{ $todo->title }}" required>
        </div>

        <div style="margin-bottom: 10px;">
            <label>Description:</label><br>
            <textarea name="desc">{{ $todo->description }}</textarea>
        </div>

        <div style="margin-bottom: 10px;">
            <label>
                <input type="checkbox" name="status" {{ $todo->is_completed ? 'checked' : '' }}>
                Terminé ?
            </label>
        </div>

        <button type="submit">Mettre à jour</button>
    </form>

    <hr>

    <form action="/todos/{{ $todo->id }}" method="POST" onsubmit="return confirm('Êtes-vous sûr ?');">
        @csrf
        @method('DELETE') <button type="submit" style="color: red;">Supprimer ce Todo</button>
    </form>

</body>
</html>
