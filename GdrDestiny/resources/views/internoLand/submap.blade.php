@extends('layouts.appInterno')
@section('content')
<img src="/img/imgHomeInterna/maps/{{ $map->name }}.png" alt="" id='mappa' >
<div id='subIcons'>


    @if( $map->id_middlemap ) 
    <meteo name_map="{{$map->name}}" route_info_meteo_map="{{ route('meteo.get.bottommap',$map->id) }}"></meteo>
    <a href="{{route("middlemap",$map->id_middlemap)}}" id='returnBackMap'>

    @else  

    <a href="{{route("home")}}" id='returnBackMap'>
        <meteo name_map="{{$map->name}}" route_info_meteo_map="{{ route('meteo.get.middlemap',$map->id) }}"></meteo>
    @endif
        <img src="/img/imgHomeInterna/Icone/map_&_chat/indietro.png" alt="">
    </a>

    @foreach ($mapchilds as $submap)

        <a href="{{ route('bottommap',[$map->id,$submap->id]) }}"><img src="/img/imgHomeInterna/Icone/map_&_chat/iconasottochat{{$submap->name}}.png" class='map' alt="" id='Map-{{$submap->id}}' onmouseout="boxIconMap.leaveBox()" onmouseover="boxIconMap.showBox('{{$submap->name}}',{{ json_encode($submap->descrizione) }},this,{ 'Closer' : 'bottom' })"></a>
    
    @endforeach

    
    @foreach ($chats as $chat)
        @if($chat->visibility === 'no')

            <a href=""><img src="/img/imgHomeInterna/Icone/map_&_chat/iconachat.png" alt="" id='Chat-{{$chat->id}}' onmouseout="boxIconMap.leaveBox()" onmouseover="boxIconMap.showBox('{{$chat->name}}',{{ json_encode($chat->descrizione) }},this,{ 'Closer' : 'bottom' })"></a>

        @else 

            <a href=""><img src="/img/imgHomeInterna/Icone/map_&_chat/iconainvisibile.png" alt="" id='Chat-hidden-{{$chat->id}}' onmouseout="boxIconMap.leaveBox()" onmouseover="boxIconMap.showBox('{{$chat->name}}',{{ json_encode($chat->descrizione) }},this,{ 'Closer' : 'bottom' })"></a>

        @endif
        
    
    @endforeach

</div>


@endsection