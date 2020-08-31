<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/SitoFacciaInterna/home.css">
    <link rel="stylesheet" href="/css/modal/modalInterna.css">
    
    <link rel="stylesheet" href="/css/box/box.css">
    <script src="/js/HomeInterna/modal.js"></script>
    <script src="/js/HomeInterna/home.js"></script>
    <script src="/js/HomeInterna/box.js"></script>
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
                    <li><a href="#"><img data-number=4 src="/img/imgHomeInterna/home/schedapg.png" alt="" onclick="modal.openModal('{{route('userProfile',\Auth::id())}}')"></a></li>
                    <li><a href="#"><img data-number=5 src="/img/imgHomeInterna/home/rymzody.png" alt=""></a></li>
                    <li><a href="{{ route('logout') }}"><img data-number=6
                                src="/img/imgHomeInterna/home/logouttuttodx.png" alt=""></a></li>
                </div>
            </ul>
        </div>
        <div class="contenitoreMappa">
            <div class="mappaDiv">
                @yield('content')
                <img src="/img/imgHomeInterna/home/messaggioff.png" id='messaggi' alt="messaggi">
                <img src="/img/imgHomeInterna/home/meteo.png" id='meteo' alt=""
                    onmouseover=box.showBox('Test','jfdjfjd',this) onmouseout=box.leaveBox()>
            </div>

        </div>
    </section>
  <script>
changeGhostHome();

let box = new Box()
let modal=new Finestra()

</script>

</body>


</html>
