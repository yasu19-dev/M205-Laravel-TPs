@extends('layout')

@section('content')
<h1>Liste des Commandes</h1>

<form action="{{ route('commandes.index') }}" method="GET" class="mb-3 d-flex gap-2">
    <input type="text" name="search_client" class="form-control" placeholder="Chercher un client..." value="{{ request('search_client') }}">
    <button type="submit" class="btn btn-primary">Filtrer</button>
</form>

<a href="{{ route('commandes.create') }}" class="btn btn-success mb-3">Nouvelle Commande</a>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Date</th>
            <th>Client</th>
            <th>Détails (Produits)</th> <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($commandes as $cmd)
        <tr>
            <td>{{ $cmd->id }}</td>
            <td>{{ $cmd->date }}</td>
            <td>{{ $cmd->client->nom }} {{ $cmd->client->prenom }}</td>
            <td>
                <ul>
                    @foreach($cmd->produits as $prod)
                        <li>{{ $prod->nom }} (Qté: {{ $prod->pivot->qte_cmd }})</li>
                    @endforeach
                </ul>

                <form action="{{ route('commandes.add_product', $cmd->id) }}" method="POST" class="d-flex gap-1 mt-2">
                    @csrf
                    <select name="produit_id" class="form-select form-select-sm" style="width: 120px;">
                        @foreach($allProduits as $p)
                            <option value="{{ $p->id }}">{{ $p->nom }}</option>
                        @endforeach
                    </select>
                    <input type="number" name="qte_cmd" value="1" min="1" class="form-control form-control-sm" style="width: 60px;">
                    <button type="submit" class="btn btn-sm btn-outline-secondary">+</button>
                </form>
            </td>
            <td>
                <a href="{{ route('commandes.edit', $cmd->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                <a href="{{ route('commandes.delete_confirm', $cmd->id) }}" class="btn btn-danger btn-sm">Supprimer</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $commandes->links() }}
@endsection
