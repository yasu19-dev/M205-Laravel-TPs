
    @if ($nombre < 10)
        @php($prix = 0.5)    
    @elseif ($nombre >=10 && $nombre < 20)
        @php ($prix = 0.4)
    @else 
    @php($prix = 0.3)
    @endif
    <h1>Prix par copie :{{ $prix }} DH</h1>
    <p>prix  de Photocopie :{{ $nombre*$prix }}</p>
