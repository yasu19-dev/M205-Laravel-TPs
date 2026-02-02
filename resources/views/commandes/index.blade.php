<!DOCTYPE html>
<html>
<head>
    <title>Liste des Commandes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Liste des Commandes</h2>
    <a href="{{ route('commandes.create') }}" class="btn btn-success mb-3">Ajouter une commande</a>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">{{ $message }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Date</th>
                <th>Client</th>
                <th>Image (Aperçu)</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($commandes as $cmd)
            <tr>
                <td>{{ $cmd->id }}</td>
                <td>{{ $cmd->date }}</td>
                <td>{{ $cmd->client_id }}</td>
                
                <td>
                    @if($cmd->image)
                        <img src="{{ asset('storage/'.$cmd->image) }}" width="50" height="50" alt="img">
                    @else
                        <span>Aucune</span>
                    @endif
                </td>

                <td>
                    <form action="{{ route('commandes.destroy',$cmd->id) }}" method="POST">
                        
                        <a class="btn btn-primary btn-sm" href="{{ route('commandes.edit',$cmd->id) }}">Modifier</a>

                        @if($cmd->image)
                            <a class="btn btn-info btn-sm" href="{{ route('commandes.download', $cmd->id) }}">Télécharger</a>
                        @endif

                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>