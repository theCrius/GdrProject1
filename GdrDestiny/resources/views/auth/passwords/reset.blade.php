<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/SitoFacciaEsterna/loginWelcome2.css">
    <link rel="stylesheet" href="/css/modal/modal.css">

    <script src="/js/HomeEsterna/modal.js"></script>


<body>
    <section>

        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <img id='sfondo' src="/img/imgHomeEsterna/sfondo.png" alt="">
            <div class="ContainerCentrale login">
                <div class="circonferenzaBlu login">
                    <img src="/img/imgHomeEsterna/login/loginprovarw.png" id='sferaRossa' alt="">
                    <div class="loginImages">
                        <img src="/img/imgHomeEsterna/imgResetPassword/email.png" alt=""><input id="email" type="email"
                            name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus
                            class='LoginInput name'>
                        <img src="/img/imgHomeEsterna/imgResetPassword/nuovapss.png" alt=""><input id="password"
                            type="password" name="password" required autocomplete="new-password"
                            class='LoginInput password'>
                        <img src="/img/imgHomeEsterna/imgResetPassword/ripetipassword.png" alt=""><input
                            id="password-confirm" type="password" name="password_confirmation" required
                            autocomplete="new-password" class='LoginInput repeatPassword'>
                        <button type='submit'><img src="/img/imgHomeEsterna/login/loginconferma.png" alt=""
                                class='buttonLogin'></button>
                    </div>
                </div>


            </div>
        </form>
    </section>
    <script>
    @if($errors->any())

    new Finestra("{{ json_encode($errors->all()) }}", null, 'Errore Durante il recupero password')
    @elseif(session('status'))

    new Finestra("{{ json_encode('Password modificata, ora hai la possibilità di continuare a giocare, buon divertimento.') }}", 'no', 'Modificata Effettuata')
    @endif
    </script>
</body>

</html>