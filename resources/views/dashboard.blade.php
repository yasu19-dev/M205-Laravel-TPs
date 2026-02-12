<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Todos</title>
    <style>
        body { font-family: sans-serif; padding: 20px; }
        .todo-item { border: 1px solid #ddd; padding: 10px; margin-bottom: 10px; }
        .completed { text-decoration: line-through; color: gray; }
        button { cursor: pointer; }
    </style>
</head>
<body>
    <h1>Mes Todos</h1>

    <a href="/todos/user">Voir seulement mes todos</a> |
    <a href="/todos">Voir tous les todos</a>

    <hr>

    <div style="background: #f9f9f9; padding: 15px; margin-bottom: 20px;">
        <h3>Créer un nouveau Todo</h3>
        <form action="/todos" method="POST">
            @csrf
            <div>
                <label>Titre:</label><br>
                <input type="text" name="title" required>
            </div>
            <div>
                <label>Description (desc):</label><br>
                <textarea name="desc"></textarea>
            </div>
            <br>
            <button type="submit">Ajouter</button>
        </form>
    </div>

    <hr>

    <h3>Liste existante</h3>
    @if(count($todos) > 0)
        @foreach($todos as $todo)
            <div class="todo-item">
                <strong class="{{ $todo->is_completed ? 'completed' : '' }}">
                    {{ $todo->title }}
                </strong>
                <p>{{ $todo->description }}</p>
                <small>Créé par User ID: {{ $todo->user_id }}</small>
                <br><br>
                <a href="/todos/{{ $todo->id }}">Voir / Modifier</a>
            </div>
        @endforeach
    @else
        <p>Aucun todo trouvé.</p>
    @endif
</body>
</html>
