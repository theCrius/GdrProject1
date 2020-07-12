@extends('./layouts/appIscrizione')
@section('content')
<div class="DivPrincipale">
    
<img class='sfondo' src="/img/imgHomeEsterna/imgIscrizione/Fase2.png" alt="">
    <a href="{{route('registrati3',[$razza,$hemisperes[0]->id])}}"><img id='emisferosinistro' src="/img/imgHomeEsterna/imgIscrizione/emisferosx.png" alt=""></a>
    <a href="{{route('registrati3',[$razza,$hemisperes[1]->id])}}"><img id='emisferodestro'src="/img/imgHomeEsterna/imgIscrizione/emisferox.png" alt=""></a>
</div>
@endsection