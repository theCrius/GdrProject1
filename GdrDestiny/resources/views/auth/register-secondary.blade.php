@extends('./layouts/appIscrizione')
@section('content')
<div class="DivPrincipale">
    
<img class='sfondo' src="/img/imgHomeEsterna/imgIscrizione/Fase2.png" alt="">

    <a href="{{route('registrati3',[$razza,2,$token])}}"><img id='emisferosinistro' src="/img/imgHomeEsterna/imgIscrizione/emisferosx.png" alt=""></a>
    <a href="{{route('registrati3',[$razza,1,$token])}}"><img id='emisferodestro'src="/img/imgHomeEsterna/imgIscrizione/emisferox.png" alt=""></a>
</div>
@endsection
@section('modal')
<script>

new Finestra('{{ json_encode($textModal) }}',true, 'Scegli l\'emisfero')
</script>
@endsection