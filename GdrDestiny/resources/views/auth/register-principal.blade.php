<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/SitoFacciaEsterna/registrazione.css">

</head>

<body>

    <div class="razzaDiv">
    
        <img class='sfondoRegistrazione1' src="/img/imgHomeEsterna/imgIscrizione/razzescelta.png" alt="">
        <a href="{{route('registrati2',$breeds[0]->id)}}"><img id='razzaDestra'
                src="/img/imgHomeEsterna/imgIscrizione/exo.png" alt=""></a>
        <a href="{{route('registrati2',$breeds[1]->id)}}"><img id='razzaSinistra'
                src="/img/imgHomeEsterna/imgIscrizione/insonni.png" alt=""></a>
        <a href="{{route('registrati2',$breeds[2]->id)}}"><img id='razzaCentrale'
                src="/img/imgHomeEsterna/imgIscrizione/umani.png" alt=""></a>
    </div>

</body>

</html>