@extends('./layouts/appIscrizione')
@section('content')
<div class="DivPrincipale">

    <img class='sfondo' src="/img/imgHomeEsterna/imgIscrizione/razzescelta.png" alt="">
    <a href="{{route('registrati2',$breeds[0]->id)}}"><img id='razzaDestra'
            src="/img/imgHomeEsterna/imgIscrizione/exo.png" alt=""></a>
    <a href="{{route('registrati2',$breeds[1]->id)}}"><img id='razzaSinistra'
            src="/img/imgHomeEsterna/imgIscrizione/insonni.png" alt=""></a>
    <a href="{{route('registrati2',$breeds[2]->id)}}"><img id='razzaCentrale'
            src="/img/imgHomeEsterna/imgIscrizione/umani.png" alt=""></a>
</div>
@endsection
@section('modal')
<script>

new Finestra('{{ json_encode($textModal) }}',true, 'Scegli la tua razza')
</script>
@endsection