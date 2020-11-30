@extends('../layouts.appModalInterno')
@section('content')
<div class="equipContent">
<img src="/img/imgHomeInterna/home/schedaPg/background/backsfondobac.png" alt=""  class='equippedSfondo centerToAbsolutePosition'>
<div class="equip centerToAbsolutePosition">
    <div class="left">
        @for($i=0;$i < 4; $i++)
        <div class="equipped">
        <img src="/img/imgHomeInterna/home/schedaPg/ObjectsEquipped/qoggetto.png" alt="" id='riquadroObjectEquipped'>

        </div>
        @endfor
    </div>
    <div class="center">
        <div class="top">
        @for($i=4;$i < 7; $i++)
            <div class="equipped">
            <img src="/img/imgHomeInterna/home/schedaPg/ObjectsEquipped/qoggetto.png" alt="" id='riquadroObjectEquipped'>

            </div>
        @endfor
        </div>
        <div class="middle"></div>
        <div class="bottom">
        @for($i=7;$i < 10; $i++)
        <div class="equipped">
        <img src="/img/imgHomeInterna/home/schedaPg/ObjectsEquipped/qoggetto.png" alt="" id='riquadroObjectEquipped'>

        </div>
        @endfor
        </div>
    </div>
    <div class="right">
    @for($i=10;$i < 14; $i++)
        <div class="equipped">
        <img src="/img/imgHomeInterna/home/schedaPg/ObjectsEquipped/qoggetto.png" alt="" id='riquadroObjectEquipped'>

        </div>
        @endfor
    </div>
</div>
</div>
@endsection