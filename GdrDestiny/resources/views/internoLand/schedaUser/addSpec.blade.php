@extends('../layouts.appModalInterno')
@section('content')
<div class="abilitaAdd">
    <div class="titleWithBackground">
    <img src="/img/imgHomeInterna/home/schedaPg/Specializzazione/rigatit.png" alt="" id='sfondoTitle'>
    <div class='centerToAbsolutePosition'><img src="/img/imgHomeInterna/home/schedaPg/Specializzazione/sceglispec.png" alt="" class='titleHeight'></div>
    </div>

    <form action="{{route('storeSpecs',$idUser)}}" method='POST'>
        @csrf
    <div class="containerWithBackground">
        <img src="/img/imgHomeInterna/home/schedaPg/Specializzazione/riqspec.png" alt="" id='sfondoTitle'>
    <div class="centerToAbsolutePosition totalWidth">
        <div class="containerAbilita">
        <div class="leftContainer">
     
      
        @for($i=0;$i < 5; $i++) 
        <div class='riquadroSpec'>
            <div class="skillToSelect modifyHeWSpec" id='spec'>
                <img src="/img/imgHomeInterna/home/schedaPg/Specializzazione/descrriq.png" class='sfondoRiquadroSkill'  @if((isset($specs[$i]))) data-id="{{  \Crypt::encrypt($specs[$i]->id)  }}" @endif alt> 
                <div class="contenitoreText">
                    <div class="title">
                        @if((isset($specs[$i]))) 

                            {{ $specs[$i]->name  }}
                           
                            
                        @else 
                        Specializzazione Non presente

                        @endif
                </div>
                    <div class="description">
                        @if((isset($specs[$i]))) 

                            {{ $specs[$i]->descrizione  }}
                           
                            
                        @else 
                        Probabilmente l'hai già acquistata

                        @endif
                    </div>
                </div>
            </div>
            <div class='logoSpec'>
                <img src="/img/imgHomeInterna/home/schedaPg/Specializzazione/specvuota.png" class='sfondoRiquadroSkill'> 
                <div class="contenitoreText">
                   
                    </div>
                </div>
            </div>
        @endfor
      
    </div>
    <div class="rightContainer">
    @for($i=5;$i < 10; $i++)
        <div class='riquadroSpec'>
        <div class="skillToSelect modifyHeWSpec" id='spec'>
            <img src="/img/imgHomeInterna/home/schedaPg/Specializzazione/descrriq.png" class='sfondoRiquadroSkill'  @if((isset($specs[$i]))) data-id="{{  \Crypt::encrypt($specs[$i]->id)  }}" @endif alt""> 
            <div class="contenitoreText">
                <div class="title">
                    @if((isset($specs[$i]))) 

                    {{ $specs[$i]->name  }}
                   
                    
                @else 
                Specializzazione Non presente

                @endif
            </div>
                <div class="description">
                    @if((isset($specs[$i]))) 

                    {{ $specs[$i]->descrizione  }}
                   
                    
                @else 
                Probabilmente l'hai già acquistata

                @endif
                </div>
            </div>
        </div>
        <div class='logoSpec'>
            <img src="/img/imgHomeInterna/home/schedaPg/Specializzazione/specvuota.png" class='sfondoRiquadroSkill'> 
            <div class="contenitoreText">
               
                </div>
            </div>
        </div>
        @endfor
    </div>
        </div>
    </div>
        </div>
        <div class="titleWithBackground">
            <img src="/img/imgHomeInterna/home/schedaPg/Specializzazione/rigatit.png" alt="" id='sfondoTitle'>
            <div class="centerToAbsolutePosition">
        <button type="submit" id='conferma'><span><img src="/img/imgHomeInterna/home/schedaPg/conferma.png"
                    alt="" class='titleHeight'></span></button>
        </div>
                    
        
        
    </div>
    </form>
</div>
@endsection