@extends('../layouts.appModalInterno')

@section('content')
<div class="containerTable">
    <table class='log'>
        <thead>
        <tr>
            <th><h1>Exp</h1></th>
            <th><h1>Motivazione</h1></th>
            <th><h1>Ricevuti da</h1></th>
            <th><h1>Dati a</h1></th>
            <th><h1>Data</h1></th>
        </tr>
    </thead>
    <tbody>
        @foreach($expTransactions as $expTransaction)
        <tr>
           
            <td><p>{{ $expTransaction['exp']['exp_dati'] }}</p></td>
            <td><p>{{ $expTransaction['exp']['motivazione'] }}</p></td>
            <td><p>{{ $expTransaction['userFrom'] ?? 'sistema'}}</p></td>
            <td><p>{{ $expTransaction['userTo'] }}</p></td>
            <td><p>{{ $expTransaction['exp']['created_at'] }}</p></td>
        </tr>
        @endforeach
    </tbody>
    </table>
</div>
@endsection