@extends('layouts.default')

@section('content')
    <h2>Cours sur les Boucles (Loops)</h2>
    <p>On peut itérer sur des tableaux avec @foreach.</p>

    <h3>Exemple : Liste de frameworks</h3>

    @php
        $frameworks = ['Laravel', 'Symfony', 'Django', 'React'];
    @endphp

    <ul>
        @foreach($frameworks as $fw)
            <li>{{ $loop->iteration }} - {{ $fw }}</li>
        @endforeach
    </ul>

    <p><small>Note : La variable $loop est automatiquement disponible dans les boucles Blade.</small></p>
@endsection
