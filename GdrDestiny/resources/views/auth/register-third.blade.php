@extends('./layouts/appIscrizione')
@section('content')
    <div class="DivPrincipale">
    
        <img class='sfondo' src="/img/imgHomeEsterna/imgIscrizione/fasesesso.png" alt="">
        <a href="{{route('registrati4',[$RazzaId,$EmisferoId,'f'])}}"><img id='femmina' src="/img/imgHomeEsterna/imgIscrizione/femmina1.png" alt=""></a>
        <a href="{{route('registrati4',[$RazzaId,$EmisferoId,'m'])}}"><img id='maschio' src="/img/imgHomeEsterna/imgIscrizione/maschio1.png" alt=""></a>

      
    </div>
@endsection


