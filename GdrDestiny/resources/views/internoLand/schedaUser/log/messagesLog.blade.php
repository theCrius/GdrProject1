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
                <td><p> {{ $message['message']['title']}}</p></td>
                <td onmouseleave="boxMessageLog.leaveBox()" onmouseover="boxMessageLog.showBox('Messaggio','{{ $message['message']['message'] }}',this,{ 'On' : null })" ><p>{{ $message['message']['message'] }}</p></td>
                <td><p>{{ $message['message']['letto'] }}</p></td>
            </tr>
           @endforeach
       
    </tbody>
    </table>
</div>
@endsection
