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
    <div class="center"></div>
    <div class="right"></div>
</div>
</div>
@endsection