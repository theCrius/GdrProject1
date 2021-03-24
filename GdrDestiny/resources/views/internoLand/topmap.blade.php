@extends('layouts.appInterno')
@section('content')

<img src="/img/imgHomeInterna/maps/{{ $map->name }}.png" alt="" id='mappa' >
<div id='subIcons'>
    @foreach ($mapchilds as $submap)

<a href="{{ route('middlemap',$submap->id) }}"><img src="/img/imgHomeInterna/Icone/map_&_chat/iconasottochat{{$submap->name}}.png" class='map' alt="" id='Map-{{$submap->id}}' onmouseout="boxIconMap.leaveBox()" onmouseover="boxIconMap.showBox('{{$submap->name}}',{{ json_encode($submap->descrizione) }},this,{ 'Closer' : 'bottom' })"></a>
    
    @endforeach

    
    @foreach ($chats as $chat)
        @if($chat->visibility === 'no')

            <a href=""><img src="/img/imgHomeInterna/Icone/map_&_chat/iconachat.png" alt="" id='Chat-{{$chat->id}}' onmouseout="boxIconMap.leaveBox()" onmouseover="boxIconMap.showBox('{{$chat->name}}',{{ json_encode($chat->descrizione) }},this,{ 'Closer' : 'bottom' })" class="chat"></a>

        @else 

            <a href=""><img src="/img/imgHomeInterna/Icone/map_&_chat/iconainvisibile.png" alt="" id='Chat-hidden-{{$chat->id}}' onmouseout="boxIconMap.leaveBox()" onmouseover="boxIconMap.showBox('{{$chat->name}}',{{ json_encode($chat->descrizione) }},this,{ 'Closer' : 'bottom' })" class="chat"></a>

        @endif
        
    
    @endforeach

</div>


@endsection