<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Recherche Commandes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">

    <h2>Rechercher des commandes</h2>

    <form method="GET" action="{{ route('commandes.search') }}" class="mb-4">
        <div class="form-group">
            <label for="client_id" class="form-label">Filtrer par Client :</label>

            <select name="client_id" id="client_id" class="form-select" onchange="this.form.submit()">
                <option value="">-- Tous les clients --</option>

                @foreach($clients as $client)
                    <option value="{{ $client->id }}" {{ request('client_id') == $client->id ? 'selected' : '' }}>
                        {{ $client->nom }} {{ $client->prenom }}
                    </option>
                @endforeach

            </select>
        </div>
    </form>

    <hr>

    <h3>Liste des commandes</h3>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID Commande</th>
                <th>Date</th>
                <th>Client</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($commandes as $cmd)
            <tr>
                <td>{{ $cmd->id }}</td>
                <td>{{ $cmd->date }}</td>
                <td>
                    {{ $cmd->client ? $cmd->client->nom : $cmd->client_id }}
                </td>
                <td>
                    <a href="{{ route('commandes.edit', $cmd->id) }}" class="btn btn-sm btn-primary">Modifier</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center">Aucune commande trouvée pour ce client.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $commandes->appends(request()->query())->links() }}
    </div>

</div>
</body>
</html>
