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
        @if(isset($objectsEquipped[$i]))
  
       <div class="previewImage" @if($userView->id === $userToView->id) title='Disequipaggia, Clicca!' @endif>
        @if($userView->id === $userToView->id)
           
           <a href="{{ route('equipsOrUnequips',['idUser' => $userToView->id,'idObject' => $objectsEquipped[$i]['id']]) }}">
  
       @endif
            <img src="/img/imgHomeInterna/home/Icone/Objects/gun2.png" alt="" >
            <div class="BoxContent topTransition">
                
                <div><h4>{{ $objectsEquipped[$i]['object']->name }}</h4></div>
                <div class='descrizione'><p>{{ $objectsEquipped[$i]['object']->descrizione }}</p><p>Usura: {{ $objectsEquipped[$i]['usura']['posseduta'] }} / {{ $objectsEquipped[$i]['usura']['massima'] }}</p></div>
                
            </div>
            
         @if($userView->id === $userToView->id)
                    
                </a>
       
            @endif
            </div>
            @endif
                
        </div>
        @endfor
    </div>
    <div class="center">
        <div class="top">
        @for($i=4;$i < 7; $i++)
        <div class="equipped">
            <img src="/img/imgHomeInterna/home/schedaPg/ObjectsEquipped/qoggetto.png" alt="" id='riquadroObjectEquipped'>
            @if(isset($objectsEquipped[$i]))
      
           <div class="previewImage" @if($userView->id === $userToView->id) title='Disequipaggia, Clicca!' @endif>
            @if($userView->id === $userToView->id)
           
           <a href="{{ route('equipsOrUnequips',['idUser' => $userToView->id,'idObject' => $objectsEquipped[$i]['id']]) }}">
  
       @endif

                <img src="/img/imgHomeInterna/home/Icone/Objects/{{ $objectsEquipped[$id]['object']->name }}.png" alt="" >
                <div class="BoxContent topTransition">
                    
                    <div><h4>{{ $objectsEquipped[$i]['object']->name }}</h4></div>
                    <div class='descrizione'><p>{{ $objectsEquipped[$i]['object']->descrizione }}</p><p>Usura: {{ $objectsEquipped[$i]['usura']['posseduta'] }} / {{ $objectsEquipped[$i]['usura']['massima'] }}</p></div>
                    
                </div>
                
             @if($userView->id === $userToView->id)
                        
                    </a>
           
                @endif
                </div>
                @endif
                    
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
            @if(isset($objectsEquipped[$i]))
      
           <div class="previewImage" @if($userView->id === $userToView->id) title='Disequipaggia, Clicca!' @endif>
            @if($userView->id === $userToView->id)
           
           <a href="{{ route('equipsOrUnequips',['idUser' => $userToView->id,'idObject' => $objectsEquipped[$i]['id']]) }}">
  
       @endif
                <img src="/img/imgHomeInterna/home/Icone/Objects/{{ $objectsEquipped[$id]['object']->name }}.png" alt="" >
                <div class="BoxContent topTransition">
                    
                    <div><h4>{{ $objectsEquipped[$i]['object']->name }}</h4></div>
                    <div class='descrizione'><p>{{ $objectsEquipped[$i]['object']->descrizione }}</p><p>Usura: {{ $objectsEquipped[$i]['object']->usura }}</p></div>
                    
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
    <div class="right">
    @for($i=10;$i < 14; $i++)
    <div class="equipped">
        <img src="/img/imgHomeInterna/home/schedaPg/ObjectsEquipped/qoggetto.png" alt="" id='riquadroObjectEquipped'>
        @if(isset($objectsEquipped[$i]))

  
       <div class="previewImage" @if($userView->id === $userToView->id) title='Disequipaggia, Clicca!' @endif>
        @if($userView->id === $userToView->id)
           
           <a href="{{ route('equipsOrUnequips',['idUser' => $userToView->id,'idObject' => $objectsEquipped[$i]['id']]) }}">
  
       @endif
            <img src="/img/imgHomeInterna/home/Icone/Objects/{{ $objectsEquipped[$id]['object']->name }}.png" alt="" >
            <div class="BoxContent topTransition">
                
                <div><h4>{{ $objectsEquipped[$i]['object']->name }}</h4></div>
                <div class='descrizione'><p>{{ $objectsEquipped[$i]['object']->descrizione }}</p><p>Usura: {{ $objectsEquipped[$i]['usura']['posseduta'] }} / {{ $objectsEquipped[$i]['usura']['massima'] }} </p></div>
                
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
</div>
@endsection