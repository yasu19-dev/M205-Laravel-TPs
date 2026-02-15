<form action="{{ route('livres.store') }}" method="POST">
    @csrf
    <input type="text" name="titre" placeholder="Titre">
    <select name="auteur_id">
        @foreach($auteurs as $auteur)
            <option value="{{ $auteur->id }}">{{ $auteur->nom }}</option>
        @endforeach
    </select>
    <button type="submit">Ajouter</button>
</form>
