@extends('layouts.app')

@section('title', 'Inscription')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-6 col-lg-5">
        <div class="card">
            <div class="card-header bg-white text-center py-3">
                <h4 class="mb-0">Créer un compte</h4>
            </div>
            <div class="card-body p-4">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('enregistrer') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Choisir un Login</label>
                        <input type="text" name="login" class="form-control" value="{{ old('login') }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Choisir un Mot de passe</label>
                        <input type="password" name="mot_passe" class="form-control" required>
                        <div class="form-text">Minimum 6 caractères.</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Type de Profil</label>
                        <select name="profil" class="form-select">
                            <option value="client">Client</option>
                            <option value="admin">Administrateur</option>
                        </select>
                    </div>

                    <div class="d-grid gap-2 mt-4">
                        <button type="submit" class="btn btn-success">S'inscrire</button>
                    </div>
                </form>

                <div class="text-center mt-3">
                    <p class="small">Déjà inscrit ? <a href="{{ route('login') }}">Se connecter</a></p>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
