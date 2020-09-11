@extends('./layouts/appIscrizione')
@section('content')
<div class="DivPrincipale">

    <img class='sfondo' src="/img/imgHomeEsterna/imgIscrizione/razzescelta.png" alt="">
    <a href="{{route('registrati2',3)}}" title='Exo'><img id='razzaDestra' 
            src="/img/imgHomeEsterna/imgIscrizione/exo.png" alt=""></a>
    <a href="{{route('registrati2',2)}}" title='Insonni'><img id='razzaSinistra'
            src="/img/imgHomeEsterna/imgIscrizione/insonni.png" alt=""></a>
    <a href="{{route('registrati2',1)}}" title='Umani'><img id='razzaCentrale'
            src="/img/imgHomeEsterna/imgIscrizione/umani.png" alt=""></a>
</div>
@endsection
@section('modal')
<script>

new Finestra('{{ json_encode($textModal) }}',true, 'Scegli la tua razza')
</script>
@endsection