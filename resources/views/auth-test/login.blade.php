@extends('layouts.app')

@section('content')
<div class="container">
    <form method="POST" action="{{ route('auth.manual.login') }}" class="col-md-4 offset-md-4">
        @csrf
        <h3>Connexion Manuelle</h3>
        <div class="mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email" required>
        </div>
        <div class="mb-3">
            <input type="password" name="password" class="form-control" placeholder="Mot de passe" required>
        </div>
        <button type="submit" class="btn btn-success">Connexion</button>
        @if ($errors->has('email'))
            <p class="text-danger mt-2">{{ $errors->first('email') }}</p> 
        @endif
    </form>
</div>
@endsection
