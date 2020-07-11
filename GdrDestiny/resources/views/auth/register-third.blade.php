<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/SitoFacciaEsterna/registrazione.css">

</head>

<body>

    <div class="razzaDiv">
    
        <img class='sfondoRegistrazione1' src="/img/imgHomeEsterna/imgIscrizione/fasesesso.png" alt="">
        <a href="{{route('registrati4',[$RazzaId,$EmisferoId,'f'])}}"><img id='femmina' src="/img/imgHomeEsterna/imgIscrizione/femmina1.png" alt=""></a>
        <a href="{{route('registrati4',[$RazzaId,$EmisferoId,'m'])}}"><img id='maschio' src="/img/imgHomeEsterna/imgIscrizione/maschio1.png" alt=""></a>

      
    </div>

</body>

</html>