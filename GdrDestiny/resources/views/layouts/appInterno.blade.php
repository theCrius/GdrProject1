<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/SitoFacciaInterna/home.css">
    <link rel="stylesheet" href="/css/box/boxErrore.css">
    <link rel="stylesheet" href="/css/modal/modalInterna.css">
    <link rel="stylesheet" href="/css/SitoFacciaInterna/message.css">
    
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
                    <li><a href="#"><img data-number=4 src="/img/imgHomeInterna/home/schedapg.png" alt="" onclick="modal.openModal('{{route('userProfile',\Auth::id())}}',null,'schedaPg/userProfile.js')"></a></li>
                    <li><a href="#"><img data-number=5 src="/img/imgHomeInterna/home/rymzody.png" alt=""></a></li>
                    <li><a href="{{ route('logout') }}"><img data-number=6
                                src="/img/imgHomeInterna/home/logouttuttodx.png" alt=""></a></li>
                </div>
            </ul>
        </div>
        <div class="contenitoreMappa">
            <div class="mappaDiv">
                @yield('content')
                <message-logo route="{{ route('showNewMessages',\Auth::id() ) }}" onclick="openOrClose('.messages','onBoxRight','offBoxRight')"></message-logo>
                <img src="/img/imgHomeInterna/home/meteo.png" id='meteo' alt="" onmouseout="boxMeteo.leaveBox()" onmouseover="boxMeteo.showBox('Meteo','test',this,{ 'Closer' : 'right' })">
            
            </div>
        <message-table  class_to_close='offBoxRight' route_to_delete_messages="{{ route('deleteMessages')}}" route_to_update_status='message/update/' route_show_messages="{{ route('showMessages',\Auth::id()) }}"> </message-table>
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
