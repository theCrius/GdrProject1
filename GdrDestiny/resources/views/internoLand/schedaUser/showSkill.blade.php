@extends('../layouts.appModalInterno')

@section('content')
<div class="abilita">
    <div class="leftBox">

        <div class="boxAbilita boxRazza">
            <img src="/img/imgHomeInterna/home/schedaPg/abilità/frameab.png" alt="" class='sfondoBox'>
            <div class="titleShowSkill">
                <img src="/img/imgHomeInterna/home/schedaPg/abilità/abilitarazza.png" alt="" class='titleAbilita'>
                @if(empty($skills['breed']))
                <img src="/img/imgHomeInterna/home/Icone/piusottile.png" class='icon' id='iconAddSkill'
                    title='Aggiungi Abilita' alt=""
                    onclick="modal.openModal('{{route('addSkills',['idUser' => $id_user,'skillFrom' => 'breed'])}}',null,'{{$errors['scriptName'] ?? ''}}')">
            </div>
            @else
        </div>
        <div class="skillRazza">
            @for($i=0; $i < 3; $i++) <div class="abilitaLevel{{$i+1}}">
                <h4>{{$skills['breed'][$i]['name']}}</h4>
                <img src="/img/imgHomeInterna/home/schedaPg/abilità/numeriq.png" class='levelsAbilita' alt="">
        </div>

        @endfor
    </div>
    @endif
</div>
<div class="boxAbilita boxClasse">
    <img src="/img/imgHomeInterna/home/schedaPg/abilità/frameab.png" alt="" class='sfondoBox'>
    <div class='titleShowSkill hemispereTitle'>
    <img src="/img/imgHomeInterna/home/schedaPg/abilità/abilitaclasse.png" alt="" class='titleAbilita'>
        @if(empty($skills['classe']))
        <img src="/img/imgHomeInterna/home/Icone/piusottile.png" class='icon' id='iconAddSkill' title='Aggiungi Abilita'
            alt="" onclick="modal.openModal('{{route('addSkills',['idUser' => $id_user,'skillFrom' => 'classe'])}}',null,'{{$errors['scriptName'] ?? ''}}')">
    </div>
    @else
</div>
<div class="skillRazza">
    @for($i=0; $i < 3; $i++) <div class="abilitaLevel{{$i+1}}">
        <h4>{{$skills['classe'][$i]['name']}}</h4>
        <img src="/img/imgHomeInterna/home/schedaPg/abilità/numeriq.png" class='levelsAbilita' alt="">
</div>

@endfor
</div>
@endif

</div>
<div class="boxAbilita boxEmisfero">
    <img src="/img/imgHomeInterna/home/schedaPg/abilità/frameab.png" alt="" class='sfondoBox'>
    <div class='titleShowSkill'>
    <img src="/img/imgHomeInterna/home/schedaPg/abilità/abilitaemisfero.png" alt="" class='titleAbilita emisfero'>
        @if(empty($skills['hemispere']))
        <img src="/img/imgHomeInterna/home/Icone/piusottile.png" class='icon' id='iconAddSkill' title='Aggiungi Abilita'
            alt=""
            onclick="modal.openModal('{{route('addSkills',['idUser' => $id_user,'skillFrom' => 'hemispere'])}}',null,'{{$errors['scriptName'] ?? ''}}')">
    </div>
    @else
</div>
<div class="skillRazza">
    @for($i=0; $i < 3; $i++) <div class="abilitaLevel{{$i+1}}">
        <h4>{{$skills['hemispere'][$i]['name']}}</h4>
        <img src="/img/imgHomeInterna/home/schedaPg/abilità/numeriq.png" class='levelsAbilita' alt="">
</div>

@endfor
</div>
@endif
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