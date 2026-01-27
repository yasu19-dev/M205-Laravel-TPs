@extends('layouts.default')

@section('content')
    <h2>Cours sur les Conditions (If/Else)</h2>
    <p>Blade permet d'utiliser des directives conditionnelles simples.</p>

    <h3>Exemple :</h3>

    @php
        $note = 16;
    @endphp

    <p>La note est de : {{ $note }}/20</p>

    @if($note >= 10)
        <p style="color: green;"><strong>Résultat : Vous avez réussi !</strong></p>
    @else
        <p style="color: red;"><strong>Résultat : Échec.</strong></p>
    @endif

@endsection
