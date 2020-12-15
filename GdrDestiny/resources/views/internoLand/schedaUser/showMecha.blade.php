@extends('../layouts.appModalInterno')
@section('header')
<div class='nameMecha'><h5>dfdfsds</h5></div>


@endsection


@section('content')
<div class="boxParent centerToAbsolute">
<div class="left">
    @for($i=0; $i < 5; $i++ )
    <div class="boxChild">
        @if(1)
            <img src="/img/imgHomeInterna/home/schedaPg/mecha/errore/sxspazir.png" class='sfondoBox' alt="">
        @else 
        <img src="/img/imgHomeInterna/home/schedaPg/mecha/sxspazi.png" class='sfondoBox' alt="">
        @endif
            <div class="boxTitle sx">
                <h6>fejdj</h6>
            </div>
            <div class="boxContent toLeft" onmouseout="box.leaveBox()" onmouseover="box.showBox('sdsdsdsd','asasdasd',this)">
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
    @if(1)
    <img src="/img/imgHomeInterna/home/schedaPg/mecha/inserisciimg.png" alt="">
    @else
    @endif
    <div class="statistics">
        <div class="statistic">
            <div class="title"><h4>Statistiche</h4></div>
            <div class="stats">
                <div>
                    <h5>Forza</h5>
                    <p>10</p>
                </div>
                <div>
                    <h5>Velocita</h5>
                    <p>20</p>
                </div>
                <div>
                    <h5>Resistenza</h5>
                    <p>10</p>
                </div>
            </div>
        </div>
        <div class="health">
            <div class="title"><h4>Salute 100 / 150 </h4></div>
            <div class="descrizione">
              <p>[Spalla Destra] : <i> dfsdsfdsdfsdfs sdfsdfsdfsdfsdfsdfsdfsdfsdfsdsdfdsdfsdfsdfsdfsdfs dfssdfsff</i></p>
              <p>[Spalla Destra] : <i> dfsdsfdsdfsdfs sdfsdfsdfsdfsdfsdfsdfsdfsdfsdsdfdsdfsdfsdfsdfsdfs dfssdfsff</i></p>

            </div>
        </div>
    </div>
</div>
<div class="right">
@for($i=0; $i < 5; $i++ )
        <div class="boxChild">
            <img src="/img/imgHomeInterna/home/schedaPg/mecha/dxspazi.png" class='sfondoBox' alt="">
            <div class="boxTitle dx">
                <h6>fejdj</h6>
            </div>
            <div class="boxContent toRight" onmouseout="box.leaveBox()" onmouseover="box.showBox('sdsdsdsd','asasdasd',this)">
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