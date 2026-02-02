<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier la Commande</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Modifier la commande #{{ $commande->id }}</h2>

        <form action="{{ route('commandes.update', $commande->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') <div class="mb-3">
                <label for="id" class="form-label">ID Commande</label>
                <input type="text" class="form-control" name="id" value="{{ $commande->id }}" readonly>
            </div>

            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="date" class="form-control" name="date" value="{{ $commande->date }}">
            </div>

            <div class="mb-3">
                <label for="client_id" class="form-label">ID Client</label>
                <input type="text" class="form-control" name="client_id" value="{{ $commande->client_id }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Image actuelle :</label><br>
                @if($commande->image)
                    <div class="mb-2">
                        <img src="{{ asset('storage/'.$commande->image) }}" width="100" alt="Image actuelle">
                    </div>
                @else
                    <p class="text-muted">Aucune image pour l'instant.</p>
                @endif

                <label for="image" class="form-label">Changer l'image (Laisser vide pour garder l'actuelle) :</label>
                <input type="file" class="form-control" name="image">
            </div>

            <button type="submit" class="btn btn-warning">Mettre à jour</button>
            <a href="{{ route('commandes.index') }}" class="btn btn-secondary">Retour</a>
        </form>
    </div>
</body>
</html>