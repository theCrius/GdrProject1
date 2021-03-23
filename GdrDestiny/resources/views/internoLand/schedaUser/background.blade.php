@extends('../layouts.appModalInterno')
@section('header')
@if($userToView->id === $userView->id || $userView->hasRole(Config::get('roles.ROLE_GESTORE'),[4,5]))
<div class='editProfile'><img src="/img/imgHomeInterna/home/schedaPg/modifica.png" alt="" onclick="modal.openModal('{{route('modifyBackground', $userToView->id)}}')"></div>
@endif
<ul id='icone'>
    <li><img src="/img/imgHomeInterna/home/schedaPg/corporazione.png" alt=""> <img src="#" alt=""> </li>

    <li><img src="/img/imgHomeInterna/home/schedaPg/razzaimg.png" alt=""> <img src="/img/imgHomeInterna/Icone/Razze/{{$userToView->breed->immagini}}"  title='{{$userToView->breed->name}}'alt=""></li>

    <li> <img src="/img/imgHomeInterna/home/schedaPg/classe1.png" alt=""> 
    @if(!count($userToView->classes))
       <img src="/img/imgHomeInterna/Icone/piu.png" class='icon' alt="" title='Aggiungi Classe' onclick="modal.openModal('{{route('addClass')}}')">
    @else
        <img src="/img/imgHomeInterna/Icone/Classi/{{$userToView->classes[0]->immagine}}"  title='{{$userToView->classes[0]->name}}' alt="">
    @endif
    </li>

    <li> <img src="/img/imgHomeInterna/home/schedaPg/classe2.png" alt="">
    @if(count($userToView->classes) == 1 || count($userToView->classes) == 0)
       <img src="/img/imgHomeInterna/Icone/piu.png" class='icon' title='Aggiungi Classe' alt="" onclick="modal.openModal('{{route('addClass')}}')">
    @else
        <img src="/img/imgHomeInterna/Icone/Classi/{{$userToView->classes[1]->immagine}}" title='{{$userToView->classes[1]->name}}' alt="">
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
        <audio id="playerFake" src="{{ $userToView->url_music ?? '#' }}" autoplay></audio>
                <div class="player">
                    <button class="play" onclick="document.querySelector('#playerFake').play()"><img src="/img/imgHomeInterna/home/schedaPg/musicplayer/play.png" alt=""></button>
                    <button class="stop" onclick="document.querySelector('#playerFake').pause()"><img src="/img/imgHomeInterna/home/schedaPg/musicplayer/stop.png" alt=""></button>
                </div>
        </div>
    </div>

    <div class="riquadroDestra parentRelative">
        <img src="/img/imgHomeInterna/home/schedaPg/background/backsfondobac.png" id='riquadroImmagineStatistiche' alt="">
        <div class="titleBackground">
            <img src="/img/imgHomeInterna/home/schedaPg/background/title.png" alt="">
        </div>
        <div class="contentRight">
    <div class="background">
        <div class="textBackground">
            <p>
                {!! $userToView->background ?? 'Background non ancora scritto' !!}
            </p>
            </div>
    </div>
    <div class="notefato">
        <div class="titleNoteFato">
            <img src="/img/imgHomeInterna/home/schedaPg/background/notefatotit.png" alt="">
        </div>
        <div class="textNotefato">
            <p><i>assdasddasfqa</i></p>
            <p><i>assdasddasfqa</i></p>
            <p><i>assdasddasfqa</i></p>
            <p><i>assdasddasfqa</i></p>
            <p><i>assdasddasfqa</i></p>
            <p><i>assdasddasfqa</i></p>
            <p><i>assdasddasfqa</i></p>
            <p><i>assdasddasfqa</i></p>
            <p><i>assdasddasfqa</i></p>
            <p><i>assdasddasfqa</i></p>
            <p><i>assdasddasfqa</i></p>
            
        </div>
    </div>
</div>
</div>
</div>

@endsection

@section('footer')
<ul id='iconeFooter'>

<li><img src="/img/imgHomeInterna/home/schedaPg/emisfero.png" alt=""> <img src="/img/imgHomeInterna/Icone/Emisfero/{{ $userToView->hemispere->immagini }}"  title=' {{ $userToView->hemispere->name }} ' alt=""></li>

    <li><img src="/img/imgHomeInterna/home/schedaPg/mechaeso.png" alt=""> </li>

    <li> <img src="/img/imgHomeInterna/home/schedaPg/genere.png" alt=""> <img src="/img/imgHomeInterna/Icone/Sesso/{{ $userToView->sesso }}.png" alt=""></li>
</ul>



@endsection