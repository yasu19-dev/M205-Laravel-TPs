<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mon Application Laravel</title>
    </head>
<body>

    {{-- Inclusion du header --}}
    @include('elements.header')

    {{-- Menu de navigation (Demandé à l'étape 5) --}}
    <nav style="background: #e9ecef; padding: 10px; margin-bottom: 20px;">
        <ul style="list-style: none; display: flex; gap: 15px;">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('contact') }}">Contact</a></li>
            <li><a href="{{ route('conditions') }}">Conditions</a></li>
            <li><a href="{{ route('loops') }}">Boucles</a></li>
        </ul>
    </nav>

    {{-- Zone de contenu dynamique qui sera remplacée par les pages filles --}}
    <main style="min-height: 400px; padding: 20px;">
        @yield('content')
    </main>

    {{-- Inclusion du footer --}}
    @include('elements.footer')

</body>
</html>
