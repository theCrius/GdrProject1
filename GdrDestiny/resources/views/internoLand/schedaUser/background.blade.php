@extends('../layouts.appModalInterno')
@section('header')
@if($userToView->id === $userView->id || $userView->hasRole(Config::get('roles.ROLE_GESTORE'),[0,5]))
<div class='editProfile'><img src="/img/imgHomeInterna/home/schedaPg/modifica.png" alt="" onclick="modal.openModal('{{route('modifyBackground', $userToView->id)}}')"></div>
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
        <img src="/img/imgHomeInterna/home/schedaPg/background/background.png" alt="" id='immagineBgLeft'>
        <div class="musicPlayer">
                <audio id="player" src="#"></audio>
                <div class="player">
                    <button class="play"></button>
                    <button class="stop"></button>
                </div>
        </div>
    </div>

    <div class="riquadroDestra parentRelative">
        <img src="/img/imgHomeInterna/home/schedaPg/background/backsfondobac.png" id='riquadroImmagineStatistiche' alt="">
        <div class="titleBackground">
            <img src="/img/imgHomeInterna/home/schedaPg/background/title.png" alt="">
        </div>
        <div class="textBackground">
            <p>
                {!! $userToView->background ?? 'Background non ancora scritto' !!}
</p>
            </div>
    </div>
</div>

@endsection

@section('footer')
<ul id='iconeFooter'>

<li><img src="/img/imgHomeInterna/home/schedaPg/emisfero.png" alt=""> <img src="/img/imgHomeInterna/home/Icone/Emisfero/{{ $userToView->hemispere->immagini }}"  title=' {{ $userToView->hemispere->name }} ' alt=""></li>

    <li><img src="/img/imgHomeInterna/home/schedaPg/mechaeso.png" alt=""> </li>

    <li> <img src="/img/imgHomeInterna/home/schedaPg/genere.png" alt=""> <img src="/img/imgHomeInterna/home/Icone/Sesso/{{ $userToView->sesso }}.png" alt=""></li>
</ul>



@endsection