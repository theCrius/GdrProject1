@extends('../layouts.appModalInterno')

@section('content')
<div class="containerTable">
    <table class='log'>
        <thead>
        <tr>
            <th><h1>Exp</h1></th>
            <th><h1>Motivazione</h1></th>
            <th><br><h1>Ottenuti da</h1><h1>Sottrati da</h1><br></th>
            <th><h1>Dati a</h1></th>
            <th><h1>Data</h1></th>
        </tr>
    </thead>
    <tbody>
        @foreach($transactions as $transaction)
        <tr>
           
            <td><p>{{ $transaction['exp']['quantita'] }}</p></td>
            <td><p>{{ $transaction['exp']['motivazione'] }}</p></td>
            <td><p>
             
                @if( !$transaction['userFrom'])
                    Sistema
                @elseif($transaction['userFrom'] === $userToView->name )

                 @else 
                 {{ $transaction['userFrom'] }}
                @endif    
            </p></td>
            <td><p>
                @if( $transaction['userTo'] !== $userToView->name )
                    {{ $transaction['userTo'] }}
                @endif
                
            </p></td>
            <td><p>{{ $transaction['exp']['created_at'] }}</p></td>
        </tr>
        @endforeach
    </tbody>
    </table>
</div>
@endsection