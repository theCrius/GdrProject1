<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/SitoFacciaEsterna/registrazione.css">
    <link rel="stylesheet" href="/css/modal/modal.css">
    <script src="/js/HomeEsterna/modal.js"></script>
</head>

<body>

    <section>
        @yield('content')
    </section>

    <div class="modal">
        <div class="modal_body">
            <img src="/img/imgHomeEsterna/imgIscrizione/sfondoiscrizifine.png" alt="" id='sfondoModal'>
            <div class="closeModal"><button>&times</button></div>


            <div class="content">
                <div class="title">
                    <h1>okokdo</h1>
                </div>
                <div class="text"> @yield('contentModal')</div>
                <button type="submit"><img src="/img/imgHomeEsterna/coonfermasiclick.png" alt=""></button>
            </div>
        </div>
    </div>
</body>


</body>
<script>
new Finestra()
</script>

</html>