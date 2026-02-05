@extends('layouts.app')

@section('title', 'Mon Profil')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card mb-4 text-center">
            <div class="card-body py-5">
                <h1 class="display-5 text-primary">Bienvenue, {{ Session::get('user_login') }} !</h1>
                <p class="lead">
                    Vous êtes connecté en tant que :
                    <span class="badge bg-secondary">{{ strtoupper(Session::get('user_profil')) }}</span>
                </p>
            </div>
        </div>

        <div class="row">
            {{-- @if(Session::get('user_profil') === 'admin') --}}
            @if(session('user_profil') === 'admin')
                <div class="col-md-6 mb-3">
                    <div class="card h-100 border-primary">
                        <div class="card-body text-center">
                            <h5 class="card-title">Gestion des Commandes</h5>
                            <p class="card-text">Visualiser, modifier et supprimer les commandes.</p>
                            <a href="{{ route('commandes.index') }}" class="btn btn-primary">Gérer Commandes</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="card h-100 border-success">
                        <div class="card-body text-center">
                            <h5 class="card-title">Gestion des Produits</h5>
                            <p class="card-text">Gérer le stock et le catalogue produit.</p>
                            <a href="{{ route('produits.index') }}" class="btn btn-success">Gérer Produits</a>
                        </div>
                    </div>
                </div>

            @else
                <div class="col-12">
                    <div class="card border-info">
                        <div class="card-body">
                            <h5 class="card-title">Mes Achats</h5>
                            <p>Bienvenue dans votre espace client. Vous pouvez consulter l'historique de vos commandes ci-dessous.</p>
                            <a href="#" class="btn btn-info text-white">Voir mon historique</a>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('logout') }}" class="btn btn-outline-danger">Se déconnecter</a>
        </div>

    </div>
</div>
@endsection
