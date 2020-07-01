<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/homeEsterna.css">
    
</head>
<body>
 <section>
    <div class="leftButton">
    <img src="/img/imgHomeEsterna/iscrizione.png">
    </div>
    <div class="loginForm"></div>
    <div class="rightButton">
        {{$_SESSION['ok']='okrbo'}}
        
    <img src="/img/imgHomeEsterna/regolamento.png" alt=""></div>
    {{dd($_SESSION)}}
 </section>
    
</body>
</html>