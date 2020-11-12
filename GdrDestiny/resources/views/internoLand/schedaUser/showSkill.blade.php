@extends('../layouts.appModalInterno')

@section('content')
<div class="abilita">
    <div class="leftBox">

        <div class="boxAbilita boxRazza">
            <img src="/img/imgHomeInterna/home/schedaPg/abilità/frameab.png" alt="" class='sfondoBox'>
            <div class="titleShowCenter">
                <img src="/img/imgHomeInterna/home/schedaPg/abilità/abilitarazza.png" alt="" class='titleAbilita'>
                @if(empty($skills['breed']))
                <img src="/img/imgHomeInterna/home/Icone/piusottile.png" class='icon' id='iconAdd'
                    title='Aggiungi Abilita' alt=""
                    onclick="modal.openModal('{{route('addSkills',['idUser' => $id_user,'skillFrom' => 'breed'])}}',null,'/schedaPg/addSkill.js')">
                    
            </div>
            @else
        </div>
        <div class="skillRazza">
            @for($i=0; $i < 3; $i++) 
            <div class="abilitaLevel{{$i+1}}">
                <h4>{{$skills['breed'][$i]['name']}}</h4>
                <div class='skillLevels'>
                <div class='livelli'>
           <ul>
                @for($z=1; $z <= 15; $z++ )
                @if($skills['breed'][$i]['level']+1 === $z)
                <a href="{{route('updateSkillLevel',['idUser' => \Auth::id(), 'idSkill' => $skills['breed'][$i]['id']])}}">
                @endif
                <li 
                @if($z <= $skills['breed'][$i]['level'])
                    class='levelGotten'
                @endif
                
                >
                    
                        <p>{{$z}}</p>
                   
                </li>
                @if($skills['breed'][$i]['level'] + 1  === $z)
                </a>
                @endif
        
                @endfor
                </ul>
                </div>
              
                <img src="/img/imgHomeInterna/home/schedaPg/abilità/caselle.png" class='levelsAbilita' alt="">
                </div>
        </div>
        
        @endfor
        </div>
        @endif
        </div>
        
<div class="boxAbilita boxClasse">
    <img src="/img/imgHomeInterna/home/schedaPg/abilità/frameab.png" alt="" class='sfondoBox'>
    <div class='titleShowCenter hemispereTitle'>
    <img src="/img/imgHomeInterna/home/schedaPg/abilità/abilitaclasse.png" alt="" class='titleAbilita'>
        @if(empty($skills['classe']))
        <img src="/img/imgHomeInterna/home/Icone/piusottile.png" class='icon' id='iconAdd' title='Aggiungi Abilita'
            alt="" onclick="modal.openModal('{{route('addSkills',['idUser' => $id_user,'skillFrom' => 'classe'])}}',null,'/schedaPg/addSkill.js')">
    </div>
    @else
</div>
<div class="skillRazza">
    @for($i=0; $i < 3; $i++) <div class="abilitaLevel{{$i+1}}">
        <h4>{{$skills['classe'][$i]['name']}}</h4>
        <div class='skillLevels'>
        <div class='livelli'>
   <ul>
        @for($z=1; $z <= 15; $z++ )
        @if($skills['classe'][$i]['level']+1 === $z)
        <a href="{{route('updateSkillLevel',['idUser' => \Auth::id(), 'idSkill' => $skills['classe'][$i]['id']])}}">
        @endif
        <li 
        @if($z <= $skills['classe'][$i]['level'])
            class='levelGotten'
        @endif
        
        >
            
                <p>{{$z}}</p>
           
        </li>
        @if($skills['classe'][$i]['level'] + 1  === $z)
        </a>
        @endif

        @endfor
        </ul>
        </div>
      
        <img src="/img/imgHomeInterna/home/schedaPg/abilità/caselle.png" class='levelsAbilita' alt="">
        </div>
</div>

@endfor
</div>
@endif

</div>
<div class="boxAbilita boxEmisfero">
    <img src="/img/imgHomeInterna/home/schedaPg/abilità/frameab.png" alt="" class='sfondoBox'>
    <div class='titleShowCenter'>
    <img src="/img/imgHomeInterna/home/schedaPg/abilità/abilitaemisfero.png" alt="" class='titleAbilita emisfero'>
        @if(empty($skills['hemispere']))
        <img src="/img/imgHomeInterna/home/Icone/piusottile.png" class='icon' id='iconAdd' title='Aggiungi Abilita'
            alt=""
            onclick="modal.openModal('{{route('addSkills',['idUser' => $id_user,'skillFrom' => 'hemispere'])}}',null,'/schedaPg/addSkill.js')">
    </div>
         @else
</div>
<div class="skillRazza">
    @for($i=0; $i < 3; $i++) 
    <div class="abilitaLevel{{$i+1}}">
        <h4>{{$skills['hemispere'][$i]['name']}}</h4>
        <div class='skillLevels'>
        <div class='livelli'>
   <ul>
        @for($z=1; $z <= 15; $z++ )
        @if($skills['hemispere'][$i]['level']+1 === $z)
        <a href="{{route('updateSkillLevel',['idUser' => \Auth::id(), 'idSkill' => $skills['hemispere'][$i]['id']])}}">
        @endif
        <li 
        @if($z <= $skills['hemispere'][$i]['level'])
            class='levelGotten'
        @endif
        
        >
            
                <p>{{$z}}</p>
           
        </li>
        @if($skills['hemispere'][$i]['level'] + 1  === $z)
        </a>
        @endif

        @endfor
        </ul>
        </div>
      
        <img src="/img/imgHomeInterna/home/schedaPg/abilità/caselle.png" class='levelsAbilita' alt="">
        </div>
</div>

@endfor
</div>
@endif
</div>
</div>
<div class="rightBox">
    <div class="boxSpec boxRazza">
        <img src="/img/imgHomeInterna/home/schedaPg/abilità/frameqspec.png" alt="" class='sfondoBox'>

        <div class='titleShowCenter'>
            <img src="/img/imgHomeInterna/home/schedaPg/abilità/specializzazioni.png" alt="" class='titleSpec'>
                @if($skills['breed'])
                <img src="/img/imgHomeInterna/home/Icone/piusottile.png" class='icon addSpec' id='iconAdd'  title='Aggiungi Abilita'
                    alt=""
                    onclick="modal.openModal('{{route('addSpecs',['idUser' => $id_user,'specFrom' => 'breed'])}}',null,'/schedaPg/addSpec.js')">
                @endif
                </div>
        <div class="immaginiSpec">
            <ul>
                @for($i=0; $i < 10; $i++) <li> 
                    <div class='logoSpecShow'>
                        <img src="/img/imgHomeInterna/home/schedaPg/abilità/framespecs.png" class='sfondoRiquadroSkill'> 
                        <div class="contenitoreText">
                            @if(isset($specs['breed'][$i]))
                    <img src="/img/imgHomeInterna/home/Icone/Specializzazioni/{{$specs['breed'][$i]->url_image}}" class='sfondoRiquadroSkill' id='iconeSpecs'> 
                    @endif
                            </div>
                        </div>
                    
                   
                    </li>
                    @endfor
            </ul>
        </div>
    </div>
    <div class="boxSpec boxClasse">
        <img src="/img/imgHomeInterna/home/schedaPg/abilità/frameqspec.png" alt="" class='sfondoBox'>
        <div class='titleShowCenter'>
            <img src="/img/imgHomeInterna/home/schedaPg/abilità/specializzazioni.png" alt="" class='titleSpec'>
                @if($skills['classe'])
                <img src="/img/imgHomeInterna/home/Icone/piusottile.png" class='icon addSpec' id='iconAdd'  title='Aggiungi Abilita'
                    alt=""
                    onclick="modal.openModal('{{route('addSpecs',['idUser' => $id_user,'specFrom' => 'classe'])}}',null,'/schedaPg/addSpec.js')">
                @endif
                </div>
        <div class="immaginiSpec">
            <ul>
                @for($i=0; $i < 10; $i++)
                 <li> 
                    <div class='logoSpecShow'>
                        <img src="/img/imgHomeInterna/home/schedaPg/abilità/framespecs.png" class='sfondoRiquadroSkill'> 
                        <div class="contenitoreText">
                            @if(isset($specs['classe'][$i]))
                    <img src="/img/imgHomeInterna/home/Icone/Specializzazioni/{{$specs['classe'][$i]}}" class='sfondoRiquadroSkill' id='iconeSpecsShow'> 
                    @endif
                            </div>
                        </div>
                    </li>
                    @endfor
            </ul>
        </div>
    </div>
    <div class="boxSpec boxEmisfero">
        <img src="/img/imgHomeInterna/home/schedaPg/abilità/frameqspec.png" alt="" class='sfondoBox'>
        <div class='titleShowCenter'>
            <img src="/img/imgHomeInterna/home/schedaPg/abilità/specializzazioni.png" alt="" class='titleSpec'>
                @if($skills['hemispere'])
                <img src="/img/imgHomeInterna/home/Icone/piusottile.png" class='icon addSpec' id='iconAdd'  title='Aggiungi Abilita'
                    alt=""
                    onclick="modal.openModal('{{route('addSpecs',['idUser' => $id_user,'specFrom' => 'hemispere'])}}',null,'/schedaPg/addSpec.js')">
                @endif
                </div>
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