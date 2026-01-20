@extends('layout')

@section('content')
<div class="row">
    <div class="col-md-6">
        <h3>Commandes par Client</h3>
        <ul class="list-group">
            @foreach($clientsStats as $client)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{ $client->nom }} {{ $client->prenom }}
                    <span class="badge bg-primary rounded-pill">{{ $client->commandes_count }} commandes</span>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="col-md-6">
        <h3>Liste des Produits</h3>
        <form action="{{ route('commandes.stats') }}" method="GET" class="mb-3">
            <input type="text" name="search_produit" class="form-control" placeholder="Rechercher un produit..." value="{{ request('search_produit') }}">
        </form>

        <table class="table">
            <thead><tr><th>Nom</th><th>Prix</th><th>Stock</th></tr></thead>
            <tbody>
                @foreach($produits as $prod)
                <tr>
                    <td>{{ $prod->nom }}</td>
                    <td>{{ $prod->prix }} DH</td>
                    <td>{{ $prod->qte_stock }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
