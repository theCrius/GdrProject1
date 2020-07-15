@extends('./layouts/appIscrizione')
@section('content')

    <form action="{{route('register',['razza' => $RazzaId,'emisfero' => $EmisferoId,'sesso' => $Sesso])}}" method="POST"
        id="form1">
        @csrf
        <div class="DivPrincipale">
            <img class='sfondo' src="/img/imgHomeEsterna/imgIscrizione/Fase1.png" alt="">
            <input type="text" name="name" class='inputTextRegistrazione' id='firstChild'>
            <input type="text" name="cognome" class='inputTextRegistrazione' id='secondChild'>
            <input type="text" name="email" class='inputTextRegistrazione' id='thirdChild'>
            <input type="text" name="nazionalità" class='inputTextRegistrazione' id='fourthChild'>
            <button type="submit" id='entra' form="form1"><img src="/img/imgHomeEsterna/imgIscrizione/siclick.png"
                    alt=""></button>
        </div>
    </form>
@endsection


@section('titleModal')

Condizioni di utilizzo

@endsection

@section('contentModal')
<p>
Registrazione (ai sensi del D. Lgs n°196/2003 - Codice in materia di protezione dei dati personali e del Regolamento UE 2016/679):

L'utente, registrandosi, presta il consenso al trattamento dei suoi dati ed autorizza l'inserimento degli stessi nel database del gioco con il fine di aggiungerli ai dati del pbc per consentirne l’utlizzo.. 
I dati sono vincolati all’uso all’interno del sito e non verranno in alcun modo ceduti a terzi. 
I dati saranno trattati con strumenti elettronici e serviranno esclusivamente per partecipare al gioco e per ricevere eventuali ed indispensabili comunicazioni tecniche via e-mail (come l’invio della password all’indirizzo di posta elettronica dichiarata in sede di registrazione). 
Autorizzando al trattamento dei dati, l’utente autorizza non solo la registrazione dell’indirizzo e–mail ma permette la registrazione dell’indirizzo IP, l’ora dell’iscrizione e l’ora di ogni login. 
L'interessato potrà  in ogni momento esercitare i diritti di cui all'art. 7 del D.Lgs n°196/2003, quali: 

- la possibilità  di accedere ai registri del Garante
- ottenere informazioni in relazione ai dati che lo riguardano
- ottenere la cancellazione dei propri dati

L'utente dichiara inoltre di aver preso visione del regolamento, come proposto in homepage, di averlo compreso ed accettato in ogni sua parte, e di rispondere a tutti i requisiti richiesti, comprese le eventuali restrizioni di età.

Nel caso in cui un soggetto venga bannato gli unici dati che verranno mantenuti saranno quelli per consentirne l’allontanamento dal sito fin quando sarà ritenuto necessario dalla pena e, solo in questo caso, non potrà essere richiesta la totale cancellazione dei dati, ma solo una parziale 
</p>
@endsection