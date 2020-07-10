<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/SitoFacciaEsterna/registrazione.css">

    <title>Document</title>
</head>
<body>
<div class="razzaDiv">
    
<img class='sfondoRegistrazione1' src="/img/imgHomeEsterna/imgIscrizione/Fase2.png" alt="">
    <a href="{{route('registrati3',[$razza,$hemisperes[0]->id])}}"><img id='emisferosinistro' src="/img/imgHomeEsterna/imgIscrizione/emisferosx.png" alt=""></a>
    <a href="{{route('registrati3',[$razza,$hemisperes[1]->id])}}"><img id='emisferodestro'src="/img/imgHomeEsterna/imgIscrizione/emisferox.png" alt=""></a>
</div>

</body>
</html>