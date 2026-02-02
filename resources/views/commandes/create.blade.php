<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une Commande</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Ajouter une nouvelle commande</h2>
        
        <form action="{{ route('commandes.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="id" class="form-label">ID Commande</label>
                <input type="text" class="form-control" name="id" required>
            </div>

            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="date" class="form-control" name="date" required>
            </div>

            <div class="mb-3">
                <label for="client_id" class="form-label">ID Client</label>
                <input type="text" class="form-control" name="client_id" required>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image / Fichier (Optionnel)</label>
                <input type="file" class="form-control" name="image">
            </div>

            <button type="submit" class="btn btn-primary">Enregistrer</button>
            <a href="{{ route('commandes.index') }}" class="btn btn-secondary">Retour</a>
        </form>
    </div>
</body>
</html>

