@extends('layout')

@section('content')
<h2>Ajouter une commande</h2>
<form action="{{ route('commandes.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Client</label>
        <select name="client_id" class="form-control">
            @foreach($clients as $client)
                <option value="{{ $client->id }}">{{ $client->nom }} {{ $client->prenom }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label>Date</label>
        <input type="date" name="date" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Enregistrer</button>
</form>
@endsection
