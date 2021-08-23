@extends('../layouts.appModalInterno')

@section('content')
<div class="containerTable">
    <table class='log'>
        <thead>
        <tr>
            <th><h1>Quantità</h1></th>
            <th><h1>Motivazione</h1></th>
            <th><br><h1>Ottenuti da</h1><h1>Sottrati da</h1><br></th>
            <th><h1>Dati a</h1></th>
            <th><h1>Data</h1></th>
        </tr>
    </thead>
    <tbody>
        @foreach($transactions as $transaction)
        <tr>
           
            <td><p>{{ $transaction['exp']['quantita'] ?? $transaction['money']['quantita']}}</p></td>
            <td><p>{{ $transaction['exp']['motivazione'] ?? $transaction['money']['motivazione'] }}</p></td>
            <td><p>
                @if( !isset($transaction['userFrom']))
                    Sistema
                @elseif($transaction['userFrom'] != $userToView->name )
                    {{ $transaction['userFrom'] }}
                @endif    
            </p></td>
            <td><p>
                @if( $transaction['userTo'] !== $userToView->name )
                    {{ $transaction['userTo'] }}
                @endif
                
            </p></td>
            <td><p>{{ $transaction['exp']['created_at']  ?? $transaction['money']['created_at']}}</p></td>
        </tr>
        @endforeach
    </tbody>
    </table>
</div>
@endsection