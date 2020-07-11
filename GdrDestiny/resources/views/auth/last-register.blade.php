<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/SitoFacciaEsterna/registrazione.css">
</head>
<body>

    <form action="{{route('register',['razza' => $RazzaId,'emisfero' => $EmisferoId,'sesso' => $Sesso])}}" method="POST" id="form1">
   @csrf
    <div class="razzaDiv">
    <img class='sfondoRegistrazione1' src="/img/imgHomeEsterna/imgIscrizione/Fase1.png" alt="">
 <input type="text" name="nome" class='inputTextRegistrazione' id='firstChild'>
 <input type="text" name="cognome" class='inputTextRegistrazione' id='secondChild'>
 <input type="text" name="email" class='inputTextRegistrazione' id='thirdChild'>
<input type="text" name="nazionalità" class='inputTextRegistrazione' id='fourthChild'>
<button type="submit" id='entra' form="form1"><img src="/img/imgHomeEsterna/imgIscrizione/siclick.png" alt=""></button>
</div>
</form>
</body>
</html>