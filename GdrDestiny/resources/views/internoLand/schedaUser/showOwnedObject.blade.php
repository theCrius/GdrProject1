@extends('../layouts.appModalInterno')
@section('content')
<div class="equipOwnedContent centerToAbsolutePosition">
    <div class="titleCenter">
    <img src="/img/imgHomeInterna/home/schedaPg/ObjectsEquipped/deposito.png" id='titleDep' alt="">
</div>
        @for($i=0;$i < 21; $i++)
        <div class='owned boxShadow'>
            <img src="/img/imgHomeInterna/home/schedaPg/ObjectsEquipped/qoggetto.png" alt="" id='riquadroObjectOwned' >
            <div class="previewImage">
                <img src="/img/imgHomeInterna/home/Icone/Objects/gun2.png" alt="" >
                <div class="BoxContent">
                    <div><h4>Beretta 50.</h4></div>
                    <div class='descrizione'><p>Colpi: 30</p><p>Gittata Massima: 50metri</p><p>Gittata Massima: 50metri</p><p>Gittata Massima: 50metri</p></div>
                </div>
            </div>
        </div>
        @endfor
    </div>
    </div>
@endsection