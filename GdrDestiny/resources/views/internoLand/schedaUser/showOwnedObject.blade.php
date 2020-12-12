@extends('../layouts.appModalInterno')
@section('content')
<div class="equipOwnedContent centerToAbsolutePosition">
    <div class="titleCenter">
    <img src="/img/imgHomeInterna/home/schedaPg/ObjectsEquipped/deposito.png" id='titleDep' alt="">
</div>
        @for($i=0;$i < 21; $i++)
        <div class='owned boxShadow'>
            <img src="/img/imgHomeInterna/home/schedaPg/ObjectsEquipped/qoggetto.png" alt="" id='riquadroObjectOwned' >
            @if(isset($objectsOwned[$i]))
           
           
                <div class="previewImage" @if($userView->id === $userToView->id) title='Vuoi Equipaggiare il tuo oggetto? Clicca' @endif>
                    @if($userView->id === $userToView->id)
                    
                    <a href="{{ route('equipsOrUnequips',['idUser' => $userToView->id,'idObject' => $objectsOwned[$i]['id']]) }}">
           
                @endif
                <img src="/img/imgHomeInterna/home/Icone/Objects/{{ $objectsOwned[$id]['object']->name }}.png" alt="" >
                <div class="BoxContent">
                    <div><h4>{{ $objectsOwned[$i]['object']->name }}</h4></div>

                    <div class='descrizione'><p>{{ $objectsOwned[$i]['object']->descrizione }}</p><p>Usura: {{ $objectsOwned[$i]['usura']['posseduta'] }} / {{ $objectsOwned[$i]['usura']['massima'] }}</p></div>
                   
                </div>
                @if($userView->id === $userToView->id)
                    
                </a>
       
            @endif
            </div>
            @endif
        </div>
        @endfor
    </div>
    </div>
@endsection