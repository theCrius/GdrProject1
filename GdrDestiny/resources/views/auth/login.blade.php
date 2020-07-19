<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/SitoFacciaEsterna/loginWelcome2.css">
    <link rel="stylesheet" href="/css/modal/modal.css">
    
    <script src="/js/HomeEsterna/modal.js"></script>


<body>
    <section>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <img id='sfondo' src="/img/imgHomeEsterna/sfondo.png" alt="">
            <div class="ContainerCentrale login">
                <div class="circonferenzaBlu login">
                    <img src="/img/imgHomeEsterna/login/loginprovarw.png" id='sferaRossa' alt="">
                    <div class="loginImages">
                        <img src="/img/imgHomeEsterna/login/nomelogin.png" alt=""><input type="text" name="name" class="LoginInput name">
                        <img src="/img/imgHomeEsterna/login/pswriga.png" alt=""><input type="password" name="password" class="LoginInput password">
                        <button type='submit'><img src="/img/imgHomeEsterna/login/loginconferma.png" alt="" class='buttonLogin'></button>
                          <a href="{{ route('password.request') }}">  <img src="/img/imgHomeEsterna/login/recuperopass.png" alt="" class='buttonLogin'></a>
                        
                    </div>
                </div>


            </div>
        </form>
    </section>
    <script>
@if($errors->any())

new Finestra("{{ json_encode($errors->all()) }}",null, 'Errore Durante il Loggin')
@endif
</script>
</body>

</html>