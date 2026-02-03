<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Corbeille Produits</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Corbeille (Produits supprimés)</h1>

    <a href="{{ route('produits.index') }}" class="btn btn-secondary mb-3">← Retour à la liste</a>

    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nom du produit</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($produits as $produit)
            <tr>
                <td>{{ $produit->id }}</td>
                <td>{{ $produit->nom }}</td>
                <td>
                    <a href="{{ route('produits.restore', $produit->id) }}" class="btn btn-success btn-sm">
                        Restaurer
                    </a>

                    <form action="{{ route('produits.forceDestroy', $produit->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Attention ! Cette suppression est irréversible. Continuer ?')">
                            Supprimer définitivement
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="text-center text-muted">La corbeille est vide.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
</body>
</html>
