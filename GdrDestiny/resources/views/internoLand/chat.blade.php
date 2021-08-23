@extends('layouts.appInterno')
@section('content')
@php
$userLogged = \Auth::user()

@endphp

<link rel="stylesheet" href="/css/SitoFacciaInterna/chat.css">

    <img src="/img/imgHomeInterna/chat/basechat.png" alt="" id='mappa' >
    <div id="mainChat">
        <div id="topChat">
        <div id="topChat-left">
            <img src="/img/imgHomeInterna/chat/finestradescrizioneluogo.png" class="icon" id="descrizioneLuogoChat" alt="" @click="openModalVue(null,'descrizione_chat')" onmouseout="boxWhatIsThis.leaveBox()" onmouseover="boxWhatIsThis.showBox('Descrizione Chat','Scopri il meteo e le descrizioni della chat in cui giochi',this,{ 'Closer' : 'bottom' })">
        </div>
        <div id="topChat-middle">
            <div id="placeTitle">
            <img src="/img/imgHomeInterna/chat/statoluogo.png" alt="">
            <div id="infoChat">
            <h1 class="title">{{ $chat->name }}</h1>
            @if( $chat->news->first() )
                 <img src="/img/imgHomeInterna/Icone/map_&_chat/news.png" alt="" id="news" onmouseout="boxWhatIsThis.leaveBox()" onmouseover="boxWhatIsThis.showBox('News',{{ json_encode($newsToShowOnTooltip) }},this,{ 'Closer' : 'bottom' })">
            @endif
            </div>
            </div>        
        </div>
        <div id="topChat-right"></div>

        </div>
        <div id="middleChat">
        <chat-tools :tools={{ $tools }}></chat-tools>
        <middle-chat :chat_id ="{{ $userLogged->getLastChatInfo()['chat']->id}}" :current_user="{{ $userLogged }}" ></middle-chat>
        </div>
        <bottom-chat route-to-get-back = "{{ $route_to_get_back }}"></bottom-chat>
    </div>
    <message-icon-chat :new_messages="newMessages" onclick="openOrClose('.messages','onBoxRight','offBoxRight')"></message-icon-chat>
@endsection