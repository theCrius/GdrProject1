@extends('../layouts.appModalInterno')
@section('header')
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
    </div>

    <div class="riquadroDestra parentRelative">
        <img src="/img/imgHomeInterna/home/schedaPg/background/backsfondobac.png" id='riquadroImmagineStatistiche' alt="">
        <div class="titleBackground">
            <img src="/img/imgHomeInterna/home/schedaPg/background/title.png" alt="">
        </div>
    <form action="{{ route('updateBackground',$userToView->id) }}" method='post' id='backgroundForm'>
        @csrf 
        @method('put')
        <div class="contentUpdateBackground">
                <textarea name="background" id="backgroundTextarea" autofocus>{{$userToView->background ?? 'Background non ancora scritto' }}</textarea>
               <div id='musicLinkDiv'>
                <img src="/img/imgHomeInterna/home/schedaPg/background/linkmusica.png" alt="" id='musicEditBackground'>
                <input type="text" name="linkMusic" id="linkMusic">
               </div>
            </div>

            <button type="submit" id="confermaBackground"><span><img src="/img/imgHomeInterna/home/schedaPg/background/confermabck.png" alt=""></span></button>
        </form>
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