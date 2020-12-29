<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/SitoFacciaInterna/home.css">
    <link rel="stylesheet" href="/css/box/boxErrore.css">
    <link rel="stylesheet" href="/css/modal/modalInterna.css">
    <script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
    
    <link rel="stylesheet" href="/css/box/box.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</head>
<!-- per modificare link dei bottoni modificare anche il file home.js -->

<body>
    <section>
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
                <img src="/img/imgHomeInterna/home/messaggioff.png" id='messaggi' alt="messaggi" >
                <img src="/img/imgHomeInterna/home/meteo.png" id='meteo' alt="" onmouseout="boxMeteo.leaveBox()" onmouseover="boxMeteo.showBox('Meteo','test',this,'right')">
            </div>

        </div>
    </section>
        @if($errors)
      
                <script>
                
            document.addEventListener('DOMContentLoaded', function() {
              
        modal.openModal('{{route($errors['routeName'],$errors['parametrs'])}}','{{ isset($errors['parametrs']['errors']['message']) ? \Crypt::decrypt($errors['parametrs']['errors']['message']) : '' }}','{{$errors['scriptName'] ?? ''}}')}, false)
                </script>
            
        @endif
  
   <script type='module' src="/js/HomeInterna/main.js"></script>

</body>



</html>
