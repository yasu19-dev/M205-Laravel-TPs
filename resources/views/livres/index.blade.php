@foreach($livres as $livre)
    <p>{{ $livre->titre }} - {{ $livre->auteur->nom }}</p>
    <a href="{{ route('livres.edit', $livre) }}">Modifier</a>
    @endforeach
{{ $livres->links() }}
