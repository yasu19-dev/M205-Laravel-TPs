@extends('layout')

@section('content')
<div class="alert alert-danger">
    <h3>Confirmation de suppression</h3>
    <p>Êtes-vous sûr de vouloir supprimer la commande #{{ $commande->id }} du client {{ $commande->client->nom }} ?</p>

    <form action="{{ route('commandes.destroy', $commande->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">OUI, Supprimer</button>
        <a href="{{ route('commandes.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
