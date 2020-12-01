@extends('../layouts.appModalInterno')
@section('content')
<div class="equipContent">
<img src="/img/imgHomeInterna/home/schedaPg/background/backsfondobac.png" alt=""  class='equippedSfondo centerToAbsolutePosition'>
<div class="equip centerToAbsolutePosition">
    <div id="titleEquip">
    <img src="/img/imgHomeInterna/home/schedaPg/ObjectsEquipped/equip.png"  alt="">
    </div>
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
        <div class="middle">
            <div class="goToOwned">
                @if($userToView->id === $userView->id || $userView->hasRole(Config::get('roles.ROLE_GESTORE'),[1,2]))
                <img src="/img/imgHomeInterna/home/schedaPg/ObjectsEquipped/depositosi.png" alt="" onclick="modal.openModal('{{route('objectOwned',$userToView)}}')">
                @else 
                <img src="/img/imgHomeInterna/home/schedaPg/ObjectsEquipped/depositono.png" alt="">
                @endif

            </div>
        </div>
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