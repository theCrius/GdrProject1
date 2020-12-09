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
                @if(isset($objectsOwned[$i]))
                <img src="/img/imgHomeInterna/home/Icone/Objects/gun2.png" alt="" >
                <div class="BoxContent">
                    
                    <div><h4>{{ $objectsOwned[$i]->name }}</h4></div>
                    <div class='descrizione'><p>{{ $objectsOwned[$i]->descrizione }}</p><p>Usura: {{ $objectsOwned[$i]->usura }}</p></div>
                   
                </div>
                @endif
            </div>
        </div>
        @endfor
    </div>
    </div>
@endsection