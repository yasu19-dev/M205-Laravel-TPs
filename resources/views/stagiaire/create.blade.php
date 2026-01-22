<!DOCTYPE html>
<html>
<head><title>Ajout Stagiaire</title></head>
<body>
    <h1>Ajouter stagiaire</h1>

    @if ($errors->any())
        <div style="color: red; border: 1px solid red; padding: 10px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('stagiaire.insert') }}" method="POST">
        @csrf
        Nom : <input type="text" name="nom" value="{{ old('nom') }}">
        @error('nom') <span style="color: red">{{ $message }}</span> @enderror
        <br>

        Prenom : <input type="text" name="prenom" value="{{ old('prenom') }}"><br>
        Age : <input type="text" name="age" value="{{ old('age') }}"><br>
        <button type="submit">Valider</button>
    </form>
</body>
</html>
