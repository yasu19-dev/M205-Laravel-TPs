@extends('layouts.app')

@section('title', 'Connexion')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-6 col-lg-4">
        <div class="card">
            <div class="card-header bg-white text-center py-3">
                <h4 class="mb-0">Connexion</h4>
            </div>
            <div class="card-body p-4">

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <form action="{{ route('login.post') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="login" class="form-label">Identifiant (Login)</label>
                        <input type="text" name="login" class="form-control" placeholder="Entrez votre login" required>
                    </div>

                    <div class="mb-3">
                        <label for="mot_passe" class="form-label">Mot de passe</label>
                        <input type="password" name="mot_passe" class="form-control" placeholder="Entrez votre mot de passe" required>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">Se connecter</button>
                    </div>
                </form>

                <div class="text-center mt-3">
                    <p class="small">Pas encore de compte ? <a href="{{ route('inscription') }}">S'inscrire ici</a></p>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
