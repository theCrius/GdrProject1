<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/SitoFacciaEsterna/ambientazioneRegolamento.css">
    
</head>
<body>
    <section>
    <div class="container">
    <img src="/img/imgHomeEsterna/imgIscrizione/sfondoiscrizifine.png" alt="" class='sfondo'>
    <div class="body">
        <div class="left">
           @yield('leftBox')
        </div>
        <div class="right">
            <img src="/img/imgHomeEsterna/finestradxiscri.png" alt="">

            <div class="lista">
                <ul id='listPrincipale'>
                    @yield('rightBox')
                </ul>
            </div>
        </div>

    </div>
</div>
    </section>
</body>
</html>