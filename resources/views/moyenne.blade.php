
    <h1>Bulletin</h1>
    <strong>Nom etudiant : </strong>{{ $nom }} <br>
    <strong>Moyenne : </strong>{{ $note }}<br>
    <strong>Decision : </strong>
    @if ($note >= 10)
     
            {{ $decision = 'Admis' }}
       
    @elseif ($note>=7 && $note <10)
       
{{            $decision = 'Rattrapage'
}}      
    @else
      
            {{ $decision = 'non Admis' }}
      
    @endif 
    {{-- @if ($note >= 10)
        @php
            $decision = 'Admis'
        @endphp
    @elseif ($note>=7 && $note <10)
        @php
            $decision = 'Rattrapage'
        @endphp
    @else
        @php
            $decision = 'non Admis'
        @endphp
    @endif 
    <strong>Decision : </strong>{{ $decision }} 
    --}}
