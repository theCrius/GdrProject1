@extends('../layouts.appModalInterno')
@section('header')
<div class='nameMecha'><h5>{{ $mechaName }}</h5></div>


@endsection


@section('content')
<div class="boxParent centerToAbsolute">
<div class="left">
    @for($i=0; $i < 5; $i++ )
    <div class="boxChild">
        @if( !empty( $partsHurted[ $partsOfMecha[$i] ] ) )
            <img src="/img/imgHomeInterna/home/schedaPg/mecha/errore/sxspazir.png" class='sfondoBox' alt="">
        @else 
        <img src="/img/imgHomeInterna/home/schedaPg/mecha/sxspazi.png" class='sfondoBox' alt="">
        @endif
            <div class="boxTitle sx">
                <h6>{{ $partsOfMecha[$i] }}</h6>
            </div>
            
        <div class="boxContent toLeft" @if( !empty( $partsHurted[ $partsOfMecha[$i] ] ) ) onmouseout="box.leaveBox()" onmouseover="box.showBox('Danni {{ $partsOfMecha[$i] }}',{{ json_encode($partsHurted[ $partsOfMecha[$i] ]) }},this) @endif">
                <div class="descrizione">
                    @if( !empty($objectsEquippedToMecha[ $partsOfMecha[$i] ]))
                        <h4> {{ $objectsEquippedToMecha[ $partsOfMecha[$i] ]['name'] }}</h4>
                        <p><i>LifePoints: {{ $objectsEquippedToMecha[ $partsOfMecha[$i] ]['salute']['pointsNow'] }}/{{ $objectsEquippedToMecha[ $partsOfMecha[$i] ]['salute']['fullpoints'] }} </i></p>
    

                    @endif
                </div>
                <div class="image">
                    @if( empty( $partsHurted[ $partsOfMecha[$i] ][ 'object' ] ) )
                        
                        <img src="/img/imgHomeInterna/home/schedaPg/ObjectsEquipped/qoggetto.png" alt="" class='sfondoMicroBox centerLeft'>
                    @else 

                        <img src="/img/imgHomeInterna/home/schedaPg/mecha/errore/objectHurted.gif" alt="" class='sfondoMicroBox centerLeft'>

                    
                    @endif
                    <div>
                        @if( !empty($objectsEquippedToMecha[ $partsOfMecha[$i] ]) && empty( $partsHurted[ $partsOfMecha[$i] ][ 'object' ]) )
                        <img src="/img/imgHomeInterna/home/schedaPg/mecha/Objects/{{ $objectsEquippedToMecha[ $partsOfMecha[$i] ]['name'] }}.png" id='sfondobox' alt="">
                    @endif                    </div>
                </div>
            </div>
        </div>
    @endfor
</div>
<div class="center" >

    <img src="{{ $mechaImg }}" alt="">
    
    <div class="statistics">
        <div class="statistic">
            <div class="title"><h4>Statistiche</h4></div>
            <div class="stats">
                <div>
                    <h5>Potenza</h5>
                <p>{{ $statistics['potenza'] }}</p>
                </div>
                <div>
                    <h5>Velocita</h5>
                <p>{{ $statistics['velocita'] }}</p>
                </div>
                <div>
                    <h5>Resistenza</h5>
                    <p>{{ $statistics['resistenza'] }}</p>
                </div>
            </div>
        </div>
        <div class="health">
            <div class="title"><h4>Salute {{ $points['pointsNow'] }}/{{ $points['fullpoints'] }} </h4></div>
            <div class="descrizione">
                
            @foreach ($partsHurted as $key => $partHurted)
                
                @foreach($partHurted as $key2 => $hurt)
                
                    @if( $key2 === 'object' )
                    
                        @foreach( $hurt as $Objecthurt)
                            
                            <p>[Oggetto colpito : <i>{{ $Objecthurt['name'] }}</i> -{{ $Objecthurt['hurt'] ?? '' }} ] : <i>{{ $Objecthurt['descrizione'] ?? '' }} by {{ $Objecthurt['assignedBy'] ?? '' }}</i></p>
                        
                        @endforeach

                        @break

                    @endif

                    
                    <p>[{{ ucfirst($key) }} -{{ $hurt['hurt'] ?? '' }} ] : <i>{{ $hurt['descrizione'] ?? '' }} by {{ $hurt['assignedBy'] ?? '' }}</i></p>

                
                    
                
                @endforeach
            
              @endforeach
            </div>
        </div>
    </div>
</div>
<div class="right">
@for($i=5; $i < 10; $i++ )
        <div class="boxChild">
        @if( !empty( $partsHurted[ $partsOfMecha[$i] ] ) )
            <img src="/img/imgHomeInterna/home/schedaPg/mecha/errore/dxspazir.png" class='sfondoBox' alt="">
        @else 
        <img src="/img/imgHomeInterna/home/schedaPg/mecha/dxspazi.png" class='sfondoBox' alt="">
        @endif
            <div class="boxTitle dx">
                <h6>{{ $partsOfMecha[$i] }}</h6>
            </div>
           
        <div class="boxContent toRight" @if( !empty( $partsHurted[ $partsOfMecha[$i] ] ) ) onmouseout="box.leaveBox()" onmouseover="box.showBox('Danni {{ ucfirst($partsOfMecha[$i]) }}','jjj',this) @endif">
                <div class="image">
                    @if( empty( $partsHurted[ $partsOfMecha[$i] ][ 'object' ] ) )
                        
                        <img src="/img/imgHomeInterna/home/schedaPg/ObjectsEquipped/qoggetto.png" alt="" class='sfondoMicroBox centerRight'>
                    
                    @else 

                        <img src="/img/imgHomeInterna/home/schedaPg/mecha/errore/objectHurted.gif" alt="" class='sfondoMicroBox centerRight'>

                    
                    @endif
                    <div>
                        @if( !empty($objectsEquippedToMecha[ $partsOfMecha[$i] ]) && empty( $partsHurted[ $partsOfMecha[$i] ][ 'object' ]) )
                        <img src="/img/imgHomeInterna/home/schedaPg/mecha/Objects/{{ $objectsEquippedToMecha[ $partsOfMecha[$i] ]['name'] }}.png" class='sfondoMicroBox centerRightImageObject' alt="">
                    @endif 
                    </div>
                </div>
                <div class="descrizione">
                    @if( !empty($objectsEquippedToMecha[ $partsOfMecha[$i] ]))
                   
                    <h4> {{ $objectsEquippedToMecha[ $partsOfMecha[$i] ]['name'] }}</h4>
                    <p><i>LifePoints: {{ $objectsEquippedToMecha[ $partsOfMecha[$i] ]['salute']['pointsNow'] }}/{{ $objectsEquippedToMecha[ $partsOfMecha[$i] ]['salute']['fullpoints'] }} </i></p>


                @endif
                </div>

        </div>
    </div>
    @endfor
</div>
</div>
@endsection