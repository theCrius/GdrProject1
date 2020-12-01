@extends('../layouts.appModalInterno')
@section('content')
<div class="equipOwnedContent centerToAbsolutePosition">
    <div class="titleCenter">
    <img src="/img/imgHomeInterna/home/schedaPg/ObjectsEquipped/deposito.png" id='titleDep' alt="">
</div>
        @for($i=0;$i < 32; $i++)
        <div class="owned">
            <img src="/img/imgHomeInterna/home/schedaPg/ObjectsEquipped/qoggetto.png" alt="" id='riquadroObjectOwned'>

        </div>
        @endfor
    </div>
    </div>
@endsection