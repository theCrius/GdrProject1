@extends('../layouts.appModalInterno')

@section('content')
<div class="abilita">
    <div class="leftBox">

        <div class="boxAbilita boxRazza">
            <img src="/img/imgHomeInterna/home/schedaPg/abilità/frameab.png" alt="" class='sfondoBox'>
            <img src="/img/imgHomeInterna/home/schedaPg/abilità/abilitarazza.png" alt="" class='titleAbilita'>
            <div class="skillRazza">
            
                @for($i=0; $i < 3; $i++)
                    @if(!isset($skills['breed'][$i]))
                        <img src="/img/imgHomeInterna/home/Icone/piu.png" class='icon' id='iconAddSkill{{$i}}' title='Aggiungi Abilita' alt="" onclick="modal.openModal()">
                        @continue
                    @endif
                    
                    <h3>{{$skills['breed'][$i]['name']}}</h3>
                    <img src="/img/imgHomeInterna/home/schedaPg/abilità/numeriq.png" alt="">
                @endfor
            </div>
        </div>
        <div class="boxAbilita boxClasse">
            <img src="/img/imgHomeInterna/home/schedaPg/abilità/frameab.png" alt="" class='sfondoBox'>
            <img src="/img/imgHomeInterna/home/schedaPg/abilità/abilitaclasse.png" alt="" class='titleAbilita'>
           <ul>
            @for($i=0; $i < 3; $i++)
                    @if(!isset($skills['classe'][$i]))
                        <img src="/img/imgHomeInterna/home/Icone/piu.png" class='icon' id='iconAddSkill{{$i}}' title='Aggiungi Abilita' alt="" onclick="modal.openModal()">
                    @continue
                    @endif
                    <h3>{{$skills['classe'][$i]['name']}}</h3>
                    <img src="/img/imgHomeInterna/home/schedaPg/abilità/numeriq.png" alt="">
                @endfor
                <
        </div>
        <div class="boxAbilita boxEmisfero">
            <img src="/img/imgHomeInterna/home/schedaPg/abilità/frameab.png" alt="" class='sfondoBox'>
            <img src="/img/imgHomeInterna/home/schedaPg/abilità/abilitaemisfero.png" alt=""
                class='titleAbilita emisfero'>
                <ul>
                @for($i=0; $i < 3; $i++)
                <li>
                    @if(!isset($skills['hemispere'][$i]))
                        <img src="/img/imgHomeInterna/home/Icone/piu.png" class='icon' id='iconAddSkill{{$i}}' title='Aggiungi Abilita' alt="" onclick="modal.openModal()">
                        </li>
                        @continue
                    @endif

                    <h3>{{$skills['hemispere'][$i]['name']}}</h3>
                    <img src="/img/imgHomeInterna/home/schedaPg/abilità/numeriq.png" alt="">
                    </li>
                @endfor
                </ul>
        </div>
    </div>
    <div class="rightBox">
        <div class="boxSpec boxRazza">
            <img src="/img/imgHomeInterna/home/schedaPg/abilità/frameqspec.png" alt="" class='sfondoBox'>
            <img src="/img/imgHomeInterna/home/schedaPg/abilità/specializzazioni.png" alt="" class='titleSpec'>
            <div class="immaginiSpec">
                <ul>
                    @for($i=0; $i < 10; $i++) <li> <img src="/img/imgHomeInterna/home/schedaPg/abilità/framespecs.png">
                        </li>
                        @endfor
                </ul>
            </div>
        </div>
        <div class="boxSpec boxClasse">
            <img src="/img/imgHomeInterna/home/schedaPg/abilità/frameqspec.png" alt="" class='sfondoBox'>
            <img src="/img/imgHomeInterna/home/schedaPg/abilità/specializzazioni.png" alt="" class='titleSpec'>
            <div class="immaginiSpec">
                <ul>
                    @for($i=0; $i < 10; $i++) <li> <img src="/img/imgHomeInterna/home/schedaPg/abilità/framespecs.png">
                        </li>
                        @endfor
                </ul>
            </div>
        </div>
        <div class="boxSpec boxEmisfero">
            <img src="/img/imgHomeInterna/home/schedaPg/abilità/frameqspec.png" alt="" class='sfondoBox'>
            <img src="/img/imgHomeInterna/home/schedaPg/abilità/specializzazioni.png" alt="" class='titleSpec'>
            <div class="immaginiSpec">
                <ul>
                    @for($i=0; $i < 10; $i++) <li> <img src="/img/imgHomeInterna/home/schedaPg/abilità/framespecs.png">
                        </li>
                        @endfor
                </ul>
            </div>
        </div>
    </div>

</div>
</div>
@endsection