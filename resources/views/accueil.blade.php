@extends('layouts.default')

@section('title')
    Acceuil
@endsection

@section('main')
    <x-my-component :etudiants="$etudiants" />
@endsection
