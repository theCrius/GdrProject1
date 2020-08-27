@extends('layouts.appModalInterno')
@section('header')
@if($userToView->id === $userView->id || $userView->hasRole(Config::get('roles.ROLE_GESTORE')))
<div class='editProfile'><img src="/img/imgHomeInterna/home/schedaPg/modifica.png" alt=""></div>
@endif
<ul id='icone'>
    <li><img src="/img/imgHomeInterna/home/schedaPg/corporazione.png" alt=""> <img src="#" alt=""> </li>

    <li><img src="/img/imgHomeInterna/home/schedaPg/razzaimg.png" alt=""> <img src="/img/imgHomeInterna/home/Icone/Razze/{{$userToView->breed->immagini}}" alt=""></li>

    <li> <img src="/img/imgHomeInterna/home/schedaPg/classe1.png" alt="">
    @if($userToView->class)
    
    </li>

    <li> <img src="/img/imgHomeInterna/home/schedaPg/classe2.png" alt=""></li>
    <li><img src="/img/imgHomeInterna/home/schedaPg/caricaoff.png" alt=""></li>

</ul>
@endsection

@section('content')
<div class='contentSub'>
    <div class="button">
        <img src="/img/imgHomeInterna/home/schedaPg/abilità.png" alt="">
        <img src="/img/imgHomeInterna/home/schedaPg/background.png" alt="">
        <img src="/img/imgHomeInterna/home/schedaPg/notefato.png" alt="">
        <img src="/img/imgHomeInterna/home/schedaPg/inventario.png" alt="">

    </div>

    <div class="riquadroDestra">
        <img src="/img/imgHomeInterna/home/schedaPg/contatta.png" id='inviaMessaggi' alt="">
        <img src="/img/imgHomeInterna/home/schedaPg/schedariquadro.png" id='riquadroImmagineStatistiche' alt="">
        <div class="riquadroContenuto">
            <div class="immagineProfilo">
                <img src="{{$userToView->immagine_avatar}}" alt="">
            </div>
            <div class="statisticheProfilo">
                <img src="/img/imgHomeInterna/home/schedaPg/statistiche.png" alt="">
                <div class="leftStat">
                    <ul>
                        <li>{{$userToView->forza + $userToView->breed->forza}}&nbsp&nbsp{{$userToView->breed->forzaLimite}}</li>
                        <li>{{$userToView->destrezza + $userToView->breed->destrezza}}&nbsp&nbsp{{$userToView->breed->destrezzaLimite}}</li>
                        <li>{{$userToView->resistenza + $userToView->breed->resistenza}}&nbsp&nbsp{{$userToView->breed->resistenzaLimite}}</li>
                    </ul>
                </div>
                <div class="rightStat">
                    <ul>
                        <li>{{$userToView->prontezza + $userToView->breed->prontezza}}&nbsp&nbsp{{$userToView->breed->prontezzaLimite}}</li>
                        <li>{{$userToView->percezione + $userToView->breed->percezione}}&nbsp&nbsp{{$userToView->breed->percezioneLimite}}</li>
                        <li>{{$userToView->intelligenza + $userToView->breed->intelligenza}}&nbsp&nbsp{{$userToView->breed->intelligenzaLimite}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('footer')
@if($userToView->id === $userView->id)
<div class='levelup'><img src="/img/imgHomeInterna/home/schedaPg/levelup.png" alt=""> </div>
@endif

@endsection