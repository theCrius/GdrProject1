@extends('../layouts.appModalInterno')
@section('content')
<div class="abilitaAdd">
    <div class="title"><img src="/img/imgHomeInterna/home/schedaPg/abilità/addAbilità/scegliabilità.png" alt=""></div>

    <form action="{{route('storeSkills',$idUser)}}" method='POST' id='addMultipleData'>
        @csrf

        <div class="containerAbilita">
        <div class="leftContainer">
     
      
        @for($i=0;$i < 5; $i++)
        <div class="skillToSelect" id='skill'>
    
            <img src="/img/imgHomeInterna/home/schedaPg/abilità/addAbilità/sfondoskill.png" class='sfondoRiquadroSkill'  data-id="{{\Crypt::encrypt($skills[$i]->id)}}" alt="">
            <div class="contenitoreText">
                <div class="title">
                {{$skills[$i]->name}}
                </div>
                <div class="description">
                    {{$skills[$i]->description}}
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
        <div class="skillToSelect" id='skill'>
            <img src="/img/imgHomeInterna/home/schedaPg/abilità/addAbilità/sfondoskill.png" class='sfondoRiquadroSkill'  data-id="{{\Crypt::encrypt($skills[$i]->id)}}" alt=""> 
            <div class="contenitoreText">
                <div class="title">
                {{$skills[$i]->name}}
                </div>
                <div class="description">
                    {{$skills[$i]->description}}
                </div>
            </div>
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