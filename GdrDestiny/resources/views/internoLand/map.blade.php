@extends('layouts.appInterno')
@section('content')
<img src="/img/imgHomeInterna/home/{{ $map->name }}.png" alt="" id='mappa' >
<div id='subIcons'>
    @foreach ($mapchilds as $submap)

        <img src="/img/imgHomeInterna/home/Icone/map_&_chat/iconasottochatcittà.png" class='map' alt="" id='Map-{{$submap->id}}'>
    
    @endforeach

    
    @foreach ($chats as $chat)
        @if($chat->visibility === 'no')

            <img src="/img/imgHomeInterna/home/Icone/map_&_chat/iconachat.png" alt="" id='Chat-{{$chat->id}}'>

        @else 

            <img src="/img/imgHomeInterna/home/Icone/map_&_chat/iconainvisibile.png" alt="" id='Chat-hidden-{{$chat->id}}'>

        @endif
        
    
    @endforeach

</div>


@endsection