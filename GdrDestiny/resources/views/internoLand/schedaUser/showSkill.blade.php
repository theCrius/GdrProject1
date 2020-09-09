@extends('../layouts.appModalInterno')

@section('content')
<div class="abilita">
<div class="leftBox">

<div class="boxAbilita boxRazza">
<img src="/img/imgHomeInterna/home/schedaPg/abilità/frameab.png" alt="" class='sfondoBox'>
<img src="/img/imgHomeInterna/home/schedaPg/abilità/abilitarazza.png" alt="" class='titleAbilita'>
</div>
<div class="boxAbilita boxClasse">
<img src="/img/imgHomeInterna/home/schedaPg/abilità/frameab.png" alt="" class='sfondoBox'>
<img src="/img/imgHomeInterna/home/schedaPg/abilità/abilitaclasse.png" alt="" class='titleAbilita'>

</div>
<div class="boxAbilita boxEmisfero">
<img src="/img/imgHomeInterna/home/schedaPg/abilità/frameab.png" alt="" class='sfondoBox'>
<img src="/img/imgHomeInterna/home/schedaPg/abilità/abilitaemisfero.png" alt="" class='titleAbilita emisfero'>

</div>
</div>
<div class="rightBox">
<div class="boxSpec boxRazza">
<img src="/img/imgHomeInterna/home/schedaPg/abilità/frameqspec.png" alt="" class='sfondoBox'>
<img src="/img/imgHomeInterna/home/schedaPg/abilità/specializzazioni.png" alt="" class='titleSpec'>
<div class="immaginiSpec">
    <ul>
    @for($i=0; $i < 10; $i++)
       <li> <img src="/img/imgHomeInterna/home/schedaPg/abilità/framespecs.png"></li>
    @endfor
    </ul>
</div>
</div>
<div class="boxSpec boxClasse">
<img src="/img/imgHomeInterna/home/schedaPg/abilità/frameqspec.png" alt="" class='sfondoBox'>
<img src="/img/imgHomeInterna/home/schedaPg/abilità/specializzazioni.png" alt="" class='titleSpec'>
<div class="immaginiSpec">
    <ul>
    @for($i=0; $i < 10; $i++)
       <li> <img src="/img/imgHomeInterna/home/schedaPg/abilità/framespecs.png"></li>
    @endfor
    </ul>
</div>
</div>
<div class="boxSpec boxEmisfero">
<img src="/img/imgHomeInterna/home/schedaPg/abilità/frameqspec.png" alt="" class='sfondoBox'>
<img src="/img/imgHomeInterna/home/schedaPg/abilità/specializzazioni.png" alt="" class='titleSpec'>
<div class="immaginiSpec">
    <ul>
    @for($i=0; $i < 10; $i++)
       <li> <img src="/img/imgHomeInterna/home/schedaPg/abilità/framespecs.png"></li>
    @endfor
    </ul>
</div>
</div>
</div>

</div>
</div>
@endsection