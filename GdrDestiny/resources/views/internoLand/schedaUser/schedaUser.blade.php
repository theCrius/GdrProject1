@extends('../layouts.appModalInterno')
@section('header')
@if($userToView->id === $userView->id || $userView->hasRole(Config::get('roles.ROLE_GESTORE'),[1,5]))
<div class='editProfile'><img src="/img/imgHomeInterna/home/schedaPg/modifica.png" alt=""></div>
@endif
<ul id='icone'>
    <li><img src="/img/imgHomeInterna/home/schedaPg/corporazione.png" alt=""> <img src="#" alt=""> </li>

    <li><img src="/img/imgHomeInterna/home/schedaPg/razzaimg.png" alt=""> <img src="/img/imgHomeInterna/home/Icone/Razze/{{$userToView->breed->immagini}}"  title='{{$userToView->breed->name}}'alt=""></li>

    <li> <img src="/img/imgHomeInterna/home/schedaPg/classe1.png" alt=""> 
    @if(!count($userToView->classes))
       <img src="/img/imgHomeInterna/home/Icone/piu.png" class='icon' alt="" title='Aggiungi Classe' onclick="modal.openModal('{{route('addClass')}}')">
    @else
        <img src="/img/imgHomeInterna/home/Icone/Classi/{{$userToView->classes[0]->immagine}}"  title='{{$userToView->classes[0]->name}}' alt="">
    @endif
    </li>

    <li> <img src="/img/imgHomeInterna/home/schedaPg/classe2.png" alt="">
    @if(count($userToView->classes) == 1 || count($userToView->classes) == 0)
       <img src="/img/imgHomeInterna/home/Icone/piu.png" class='icon' title='Aggiungi Classe' alt="" onclick="modal.openModal('{{route('addClass')}}')">
    @else
        <img src="/img/imgHomeInterna/home/Icone/Classi/{{$userToView->classes[1]->immagine}}" title='{{$userToView->classes[1]->name}}' alt="">
    @endif
    </li>
    
    <li><img src="/img/imgHomeInterna/home/schedaPg/caricaoff.png" alt=""></li>

</ul>
@endsection


@section('content')
<div class='contentSub'>
    <div class="button">
        <img src="/img/imgHomeInterna/home/schedaPg/abilità.png" alt="" onclick="modal.openModal('{{route('showSkills',$userToView)}}')">
        <img src="/img/imgHomeInterna/home/schedaPg/background.png"  onclick="modal.openModal('{{route('showBackground',$userToView)}}')" alt="">
        <img src="/img/imgHomeInterna/home/schedaPg/cartellaclinicatasto.png" onclick="modal.openModal('{{route('showMedicalRecord',$userToView)}}')" id='cartellaclinicatasto' alt="">
        <img src="/img/imgHomeInterna/home/schedaPg/inventario.png" alt="">

    </div>

    <div class="riquadroDestra">
        <img src="/img/imgHomeInterna/home/schedaPg/contatta.png" id='inviaMessaggi' alt="">
        <img src="/img/imgHomeInterna/home/schedaPg/schedariquadro.png" id='riquadroImmagineStatistiche' alt="">
        <img src="/img/imgHomeInterna/home/schedaPg/log.png" alt="" id='logImmagine'>
        <div id="namePg">
            <p>{{$userToView->name}} </p>
        </div>
        <div id='surnamePg'>
        <p>{{$userToView->surname}}</p>
        </div>
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
<ul id='iconeFooter'>

<li><img src="/img/imgHomeInterna/home/schedaPg/emisfero.png" alt=""> <img src="/img/imgHomeInterna/home/Icone/Emisfero/{{ $userToView->hemispere->immagini }}"  title=' {{ $userToView->hemispere->name }} ' alt=""></li>

    <li><img src="/img/imgHomeInterna/home/schedaPg/mechaeso.png" alt=""> </li>

    <li> <img src="/img/imgHomeInterna/home/schedaPg/genere.png" alt=""> <img src="/img/imgHomeInterna/home/Icone/Sesso/{{ $userToView->sesso }}.png" alt=""></li>
</ul>

@if($userToView->id === $userView->id || $userView->hasRole(Config::get('roles.ROLE_GESTORE'),[0,5]))
<div class='expShow'><img src="/img/imgHomeInterna/home/schedaPg/esperienza.png" alt=""> <p> {{$expsUser}} </div>
@endif

@endsection