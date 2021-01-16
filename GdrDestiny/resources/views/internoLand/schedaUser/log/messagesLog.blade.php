@extends('../layouts.appModalInterno')

@section('content')
<div class="containerTable messageChilds">
    <table class='log'>
        <thead>
        <tr>
            <th><h1>Inviato A</h1></th>
            <th><h1>Ricevuto Da</h1></th>
            <th><h1>Titolo</h1></th>
            <th><h1>Contenuto del Messaggio</h1></th>
            <th><h1>Visto</h1></th>
        </tr>
    </thead>
    <tbody>
       
           @foreach ($messages as $message)
           <tr>
               
                <td ><p>{{ $message['userTo'] }}</p></td>
                <td><p>{{ $message['userFrom'] }}</p></td>
                <td ><p> {{ $message['message']['title']}}</p></td>
           <td onmouseout="boxMessageLog.leaveBox()" onmouseover="boxMessageLog.showBox('{{ $message['message']['title'] ? $message['message']['title'] : 'Messaggio' }}','{{ $message['message']['message'] }}',this,{ 'Closer' : 'bottom' })" ><p>{{ $message['message']['message'] }}</p></td>
                <td><p>{{ $message['message']['letto'] }}</p></td>
           
            </tr>
           @endforeach
       
    </tbody>
    </table>
</div>
@endsection
