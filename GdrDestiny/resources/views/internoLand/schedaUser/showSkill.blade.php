@extends('../layouts.appModalInterno')

@section('content')
<div class="abilita">
    <div class="leftBox">

        <div class="boxAbilita boxRazza">
            <img src="/img/imgHomeInterna/home/schedaPg/abilità/frameab.png" alt="" class='sfondoBox'>
            <img src="/img/imgHomeInterna/home/schedaPg/abilità/abilitarazza.png" alt="" class='titleAbilita'>
            <div class="skillRazza">

                @for($i=0; $i < 3; $i++) @if(!isset($skills['breed'][$i])) <img
                    src="/img/imgHomeInterna/home/Icone/piusottile.png" class='icon' id='iconAddSkill{{$i}}'
                    title='Aggiungi Abilita' alt="" onclick="modal.openModal('{{route('addSkills',['idUser' => $id_user,'skillFrom' => 'breed'])}}')">

                    @continue
                    @endif
                    <div class="abilitaLevel{{$i+1}}">
                        <h4>{{$skills['breed'][$i]['name']}}</h4>
                        <img src="/img/imgHomeInterna/home/schedaPg/abilità/numeriq.png" class='levelsAbilita' alt="">
                    </div>

                    @endfor
            </div>
        </div>
        <div class="boxAbilita boxClasse">
            <img src="/img/imgHomeInterna/home/schedaPg/abilità/frameab.png" alt="" class='sfondoBox'>
            <img src="/img/imgHomeInterna/home/schedaPg/abilità/abilitaclasse.png" alt="" class='titleAbilita'>


            @for($i=0; $i < 3; $i++) @if(!isset($skills['classe'][$i])) <img
                src="/img/imgHomeInterna/home/Icone/piusottile.png" class='icon' id='iconAddSkill{{$i}}'
                title='Aggiungi Abilita' alt="" onclick="modal.openModal('{{route('addSkills',['idUser' => $id_user,'skillFrom' => 'classe'])}}')">

                @continue
                @endif
                <div class="abilitaLevel{{$i+1}}">
                    <h4>{{$skills['classe'][$i]['name']}}</h4>
                    <img src="/img/imgHomeInterna/home/schedaPg/abilità/numeriq.png" class='levelsAbilita' alt="">
                </div>
                @endfor

        </div>
        <div class="boxAbilita boxEmisfero">
            <img src="/img/imgHomeInterna/home/schedaPg/abilità/frameab.png" alt="" class='sfondoBox'>
            <img src="/img/imgHomeInterna/home/schedaPg/abilità/abilitaemisfero.png" alt=""
                class='titleAbilita emisfero'>
            @for($i=0; $i < 3; $i++) @if(!isset($skills['hemispere'][$i])) <img
                src="/img/imgHomeInterna/home/Icone/piusottile.png" class='icon' id='iconAddSkill{{$i}}'
                title='Aggiungi Abilita' alt="" onclick="modal.openModal('{{route('addSkills',['idUser' => $id_user,'skillFrom' => 'hemispere'])}}')">

                @continue
                @endif
                <div class="abilitaLevel{{$i+1}}">
                    <h4>{{$skills['hemispere'][$i]['name']}}</h4>
                    <div class="livelli">
                        <img src="/img/imgHomeInterna/home/schedaPg/abilità/numeriq.png" class='levelsAbilita' alt="">
                        <ul>
                            @for($l=0;$l < $skills['hemispere'][$i]['level']; $l++) 
                            <li 
                            @if($l > 5) class='beyondFive' @endif
                            > {{$l}} </li>
                
                                @endfor
                        </ul>
                    </div>
                </div>
                @endfor
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