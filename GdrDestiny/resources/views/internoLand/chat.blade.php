@extends('layouts.appInterno')
@section('content')
<link rel="stylesheet" href="/css/SitoFacciaInterna/chat.css">
    <img src="/img/imgHomeInterna/chat/basechat.png" alt="" id='mappa' >
    <div id="mainChat">
        <div id="topChat">
        <div id="topChat-left">
            <img src="/img/imgHomeInterna/chat/finestradescrizioneluogo.png" id="descrizioneLuogoChat" alt="">
        </div>
        <div id="topChat-middle">
            <div id="placeTitle">
            <img src="/img/imgHomeInterna/chat/statoluogo.png" alt="">
            <div id="infoChat">
            <h1 class="title">{{ $chat->name }}</h1>
            @if( $chat->news )
                 <img src="/img/imgHomeInterna/Icone/map_&_chat/news.png" alt="" id="news" onmouseout="boxWhatIsThis.leaveBox()" onmouseover="boxWhatIsThis.showBox('News',{{ json_encode($newsToShowOnTooltip) }},this,{ 'Closer' : 'bottom' })">
            @endif
            </div>
            </div>        
        </div>
        <div id="topChat-right"></div>

        </div>
        <div id="middleChat">
        </div>
        <bottom-chat route-to-get-back = "{{ $route_to_get_back }}"></bottom-chat>
    </div>
@endsection