@extends('../layouts.appModalInterno')

@section('content')
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
            <td><p>{{ $expTransaction->exp_dati }}</p></td>
            <td><p>{{ $expTransaction->motivazione }}</p></td>
            <td><p>{{ $expTransaction->id_user_to }}</p></td>
            <td><p>{{ $expTransaction->id_user_from }}</p></td>
            <td><p>{{ $expTransaction->created_at }}</p></td>
        </tr>
        @endforeach
    </tbody>
    </table>

@endsection