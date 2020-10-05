@extends('../layouts.appModalInterno')
@section('content')
<div class="abilitaAdd">
    <div class="title"><img src="/img/imgHomeInterna/home/schedaPg/abilità/addAbilità/scegliabilità.png" alt=""></div>

    <form action="{{route('storeSkills',$idUser)}}" method='POST'>
        @csrf

        <div class="containerAbilita">
        <div class="leftContainer">
     

        @for($i=0;$i < 5; $i++)
        <div class="skillToSelect">
    
            <img src="/img/imgHomeInterna/home/schedaPg/abilità/addAbilità/sfondoskill.png" class='sfondoRiquadroSkill' id='skill' data-id="{{$skills[$i]->id}}" alt="">
            <div class="contenitoreText">
                <div class="title">
                {{$skills[$i]->name}}
                </div>
                <div class="description">
                    
                </div>
            </div>
        </div>
        @endfor
      
    </div>
    <div class="centerContainer">
    <img src="/img/imgHomeInterna/home/schedaPg/abilità/addAbilità/ghostcentrale.gif" class='' alt="">
    </div>
    <div class="rightContainer">
    @for($i=5;$i < 10; $i++)
        <div class="skillToSelect">
            {{$skills[$i]->name}}
            <img src="/img/imgHomeInterna/home/schedaPg/abilità/addAbilità/sfondoskill.png" class='sfondoRiquadroSkill' id='skill' data-id="{{$skills[$i]->id}}" alt=""> 
        </div>
        @endfor
    </div>
        </div>
        <div class="buttonConferma">
        <button type="submit" id='conferma'><span><img src="/img/imgHomeInterna/home/schedaPg/conferma.png"
                    alt=""></span></button>
        </div>
    </form>
</div>
@endsection