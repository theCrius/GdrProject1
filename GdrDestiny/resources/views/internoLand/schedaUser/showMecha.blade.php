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
            <div class="boxContent toLeft" @if( !empty( $partsHurted[ $partsOfMecha[$i] ] ) ) onmouseout="box.leaveBox()" onmouseover="box.showBox('sdsdsdsd','asasdasd',this) @endif">
                <div class="descrizione">
                    <p>ffaafadffaafadffaafadffaafadffaafadffaafadffaafadffaafadffaafadffaafadffaafadffaafadffaafadffaafadffaafadffaafad</p>
                </div>
                <div class="image">
                    <img src="/img/imgHomeInterna/home/schedaPg/ObjectsEquipped/qoggetto.png" alt="" class='sfondoMicroBox centerLeft'>
                    <div>
                        <img src="" alt="">
                    </div>
                </div>
            </div>
        </div>
    @endfor
</div>
<div class="center" >

    <img src="{{ $userImg }}" alt="">
    
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
            @foreach ($hurts as $hurt)

            <p>[{{ ucfirst($hurt->partOfMecha) }} -{{ $hurt->hurt }}] : <i>{{ $hurt->descrizione }} by {{ $hurt->user->name }}</i></p>

            
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
            <div class="boxContent toRight" @if( !empty( $partsHurted[ $partsOfMecha[$i] ] ) ) onmouseout="box.leaveBox()" onmouseover="box.showBox('sdsdsdsd','asasdasd',this) @endif">
                <div class="image">
                    <img src="/img/imgHomeInterna/home/schedaPg/ObjectsEquipped/qoggetto.png" alt="" class='sfondoMicroBox centerRight'>
                    <div>
                        <img src="" alt="">
                    </div>
                </div>
                <div class="descrizione">
                    aassfdasdassd
                </div>

        </div>
    </div>
    @endfor
</div>
</div>
@endsection