@extends('../layouts.appModalInterno')
@section('content')
<div class="abilitaAdd">
    <div class="titleWithBackground">
    <img src="/img/imgHomeInterna/home/schedaPg/Specializzazione/rigatit.png" alt="" id='sfondoTitle'>
    <div class='titleImg'><img src="/img/imgHomeInterna/home/schedaPg/Specializzazione/sceglispec.png" alt=""></div>
    </div>

    <form action="{{route('storeSpecs',$idUser)}}" method='POST'>
        @csrf
    <div class="containerWithSfondo">
        <div class="containerAbilita">
        <div class="leftContainer">
     
      
        @for($i=0;$i < 5; $i++) 
        <div class="skillToSelect" id='spec'>
    
            <img src="/img/imgHomeInterna/home/schedaPg/abilità/addAbilità/sfondoskill.png" class='sfondoRiquadroSkill'  data-id="{{\Crypt::encrypt(}" alt"">
            <div class="contenitoreText">
                <div class="title">
                
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
        <div class="skillToSelect" id='spec'>
            <img src="/img/imgHomeInterna/home/schedaPg/abilità/addAbilità/sfondoskill.png" class='sfondoRiquadroSkill'  data-id="{{\Crypt::encrypt(}" alt""> 
            <div class="contenitoreText">
                <div class="title">
                
            </div>
                <div class="description">
                    
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
        <img src="/img/imgHomeInterna/home/schedaPg/Specializzazione/rigatit.png" alt="" id='sfondoTitle'>
    </div>
    </form>
</div>
@endsection