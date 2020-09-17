@extends('../layouts.appModalInterno')
@section('content')
<div class="abilitaAdd">
    <div class="title"><img src="/img/imgHomeInterna/home/schedaPg/abilità/addAbilità/scegliabilità.png" alt=""></div>

    <form action="{{route('storeSkills',$idUser)}}" method='POST'>
        @csrf

        <div class="containerAbilita">
        @for($i=0; $i < 10 ; $i++)
            <img src="/img/imgHomeInterna/home/schedaPg/abilità/addAbilità/scegliabilitàsfondo.png" alt="">
        @endfor
        </div>
        <div class="buttonConferma">
        <button type="submit" id='conferma'><span><img src="/img/imgHomeInterna/home/schedaPg/conferma.png"
                    alt=""></span></button>
        </div>
    </form>
</div>
@endsection