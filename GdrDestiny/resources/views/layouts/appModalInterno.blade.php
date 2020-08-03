<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/SitoFacciaInterna/schedaPg.css">

</head>

<body>
    <div class="modal">
        <div class="modal_body ui-draggable">
            <img src="/img/imgHomeInterna/home/sfondobg.png" id="sfondoModal">
            <div id="modalHeader" class="ui-draggable-handle">
                @yield('header')
                <div class="closeModal"><img src="/img/imgHomeInterna/home/chiudischeda.png"></div>
            </div>
            <div class="content">
                @yield('content')

            </div>
            <div class="footerModal">
                @yield('footer')
            </div>
        </div>
    </div>

</body>

</html>