@extends('../layouts.appModalInterno')

@section('content')
<div class="containerTable">
    <table class='log  loggedChilds'>
        <thead>
        <tr>
            <th><h1>Data</h1></th>
            <th><h1>Ip</h1></th>
        </tr>
    </thead>
    <tbody>
       
           @foreach ($logs as $log)
           <tr>
                <td><p>{{ $log->created_at }}</p></td>
                <td><p>{{ $log->ip }}</p></td>
            </tr>
           @endforeach
       
    </tbody>
    </table>
</div>
@endsection