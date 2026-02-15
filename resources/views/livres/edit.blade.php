<form action="{{ route('livres.update', $livre) }}" method="POST">
    @csrf @method('PUT')
    <input type="text" name="titre" value="{{ $livre->titre }}">
    <button type="submit">Mettre à jour</button>
</form>

