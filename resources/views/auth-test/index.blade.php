@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Test de l’API Auth Laravel</h1>
    <div class="card mt-4">
    <div class="card-body">
        @if(Auth::check())
            {{-- Si l'utilisateur est connecté --}}
            <h3 class="text-success">Bienvenue {{ Auth::user()->name }}</h3>
            <p>Email : {{ Auth::user()->email }}</p>
        @else
            {{-- Si l'utilisateur est un invité --}}
            <h3 class="text-danger">Veuillez vous connecter</h3>
            <a href="{{ route('login') }}" class="btn btn-primary">Se connecter maintenant</a>
        @endif
    </div>
    </div>

    <div class="card p-3 shadow-sm">
        <ul>
            <li><strong>Auth::check() :</strong>
                <span class="badge {{ Auth::check() ? 'bg-success' : 'bg-danger' }}">
                    {{ Auth::check() ? 'Connecté' : 'Non connecté' }}
                </span>
            </li>
            <li><strong>Auth::id() :</strong> {{ Auth::id() ?? 'Aucun' }} </li>
            <li><strong>auth()->user() (Helper) :</strong>
                @if(auth()->check())
                    {{ auth()->user()->name }} 
                @else
                    N/A
                @endif
            </li>
        </ul>

        @auth
            <a href="{{ route('auth.logout') }}" class="btn btn-danger mt-3">Logout</a> [cite: 44]
        @else
            <a href="{{ route('auth.manual.login.form') }}" class="btn btn-primary mt-3">Aller au Login Manuel</a>
        @endauth
    </div>

    @if(Auth::check())
        <div class="alert alert-info mt-3">Bienvenue {{ Auth::user()->name }}</div> [cite: 112]
    @else
        <div class="alert alert-warning mt-3">Veuillez vous connecter</div> [cite: 114]
    @endif
</div>
@endsection
