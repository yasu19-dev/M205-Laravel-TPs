@extends('layout')

@section('content')
<h2>Modifier la commande #{{ $commande->id }}</h2>
<form action="{{ route('commandes.update', $commande->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Client</label>
        <select name="client_id" class="form-control">
            @foreach($clients as $client)
                <option value="{{ $client->id }}" {{ $commande->client_id == $client->id ? 'selected' : '' }}>
                    {{ $client->nom }} {{ $client->prenom }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label>Date</label>
        <input type="date" name="date" value="{{ $commande->date }}" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Mettre à jour</button>
</form>
@endsection
