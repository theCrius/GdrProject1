@extends('../layouts.appModalInterno')
@section('content')
<div class="equipContent">
<img src="/img/imgHomeInterna/home/schedaPg/background/backsfondobac.png" alt="" id='sfondoEquipped' class='centerToAbsolutePosition'>
<div class="equip">
    <div class="left">
        @for($i=0;$i < 4; $i)
            <img src="/img/imgHomeInterna/home/schedaPg/ObjectsEquipped/qoggetto.png" alt="" id='riquadroObjectEquipped'>
        @endfor
    </div>
    <div class="center"></div>
    <div class="right"></div>
</div>
</div>
@endsection