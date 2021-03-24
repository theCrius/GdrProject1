<html lang="en">
@php
    $userLogged = \Auth::id()    
@endphp
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/SitoFacciaInterna/home.css">
    <link rel="stylesheet" href="/css/box/boxErrore.css">
    <link rel="stylesheet" href="/css/modal/modalInterna.css">
    <link rel="stylesheet" href="/css/SitoFacciaInterna/message.css">
    <link rel="stylesheet" href="/css/SitoFacciaInterna/map.css">
    
    <link rel="stylesheet" href="/css/box/box.css">


</head>
<!-- per modificare link dei bottoni modificare anche il file home.js -->

<body>
    <section id='app'>
        <div class="menuTop">
            <ul class='listMenu'>
                <div class="buttonLeft">
                    <li><a href="#"><img data-number=1 src="/img/imgHomeInterna/home/archivi.png" alt=""></a></li>
                    <li><a href="#"><img data-number=2 src="/img/imgHomeInterna/home/presenti.png" alt=""></a></li>
                    <li><a href="#"><img data-number=3 src="/img/imgHomeInterna/home/rimnet.png" alt=""></a></li>
                </div>
                <li id='ghost'><img src="/img/imgHomeInterna/home/ghost.png" alt=""></li>
                <div class="buttonRight">
                <!-- variable modal js is wrote in main js file -->
                    <li><a href="#"><img data-number=4 src="/img/imgHomeInterna/home/schedapg.png" alt="" onclick="modal.openModal('{{route('userProfile',$userLogged)}}',null,'schedaPg/userProfile.js')"></a></li>
                    <li><a href="#"><img data-number=5 src="/img/imgHomeInterna/home/rymzody.png" alt=""></a></li>
                    <li><a href="{{ route('logout') }}"><img data-number=6
                                src="/img/imgHomeInterna/home/logouttuttodx.png" alt=""></a></li>
                </div>
            </ul>
        </div>
        <div class="contenitoreMappa">
            <div class="mappaDiv">
                @yield('content')
                <message-logo :new_messages='newMessages' onclick="openOrClose('.messages','onBoxRight','offBoxRight')"></message-logo>
               
            </div>
        <message-table route_to_get_consts_value_new_message_checking="{{ route('gdrConsts.messages') }}" route_to_check_new_messages="{{ route('showNewMessages',$userLogged ) }}" route_to_get_all_users="{{ route('allUsers') }}" csrf="{{ csrf_token() }}" route_to_post_message="{{ route('storeMessage',$userLogged) }}" class_to_close='offBoxRight' route_to_delete_messages="{{ route('deleteMessages')}}" route_to_update_status='{{ route('updateMessage') }}}' route_show_messages="{{ route('showMessages',$userLogged) }}"> </message-table>
        </div>
    </section>
        @if($errors)
      
                <script>
                
            document.addEventListener('DOMContentLoaded', function() {
              
        modal.openModal('{{route($errors['routeName'],$errors['parametrs'])}}','{{ isset($errors['parametrs']['errors']['message']) ? \Crypt::decrypt($errors['parametrs']['errors']['message']) : '' }}','{{$errors['scriptName'] ?? ''}}')}, false)
                </script>
            
        @endif
  
  
    <script type='module' src="/js/HomeInterna/main.js"></script>
   <script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
   
   <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
   <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</body>



</html>
