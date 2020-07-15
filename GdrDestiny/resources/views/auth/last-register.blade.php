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
        <select name="nazionalità" id="fourthChild" class='inputTextRegistrazione'>
            @foreach($statiOptions as $state)
            <option value="{{ $state }}">{{ $state }}</option>
            @endforeach
        </select>

        <button type="submit" id='entra' form="form1"><span><img src="/img/imgHomeEsterna/imgIscrizione/siclick.png"
                    alt=""></span></button>
    </div>
</form>
@endsection


@section('titleModal')

Condizioni di utilizzo

@endsection

@section('contentModal')
<p>
    Registrazione (ai sensi del D. Lgs n°196/2003 - Codice in materia di protezione dei dati personali e del Regolamento
    UE 2016/679):

    L'utente, registrandosi, presta il consenso al trattamento dei suoi dati ed autorizza l'inserimento degli stessi nel
    database del gioco con il fine di aggiungerli ai dati del pbc per consentirne l’utlizzo..
    I dati sono vincolati all’uso all’interno del sito e non verranno in alcun modo ceduti a terzi.
    I dati saranno trattati con strumenti elettronici e serviranno esclusivamente per partecipare al gioco e per
    ricevere eventuali ed indispensabili comunicazioni tecniche via e-mail (come l’invio della password all’indirizzo di
    posta elettronica dichiarata in sede di registrazione).
    Autorizzando al trattamento dei dati, l’utente autorizza non solo la registrazione dell’indirizzo e–mail ma permette
    la registrazione dell’indirizzo IP, l’ora dell’iscrizione e l’ora di ogni login.
    L'interessato potrà  in ogni momento esercitare i diritti di cui all'art. 7 del D.Lgs n°196/2003, quali:

    - la possibilità  di accedere ai registri del Garante
    - ottenere informazioni in relazione ai dati che lo riguardano
    - ottenere la cancellazione dei propri dati

    L'utente dichiara inoltre di aver preso visione del regolamento, come proposto in homepage, di averlo compreso ed
    accettato in ogni sua parte, e di rispondere a tutti i requisiti richiesti, comprese le eventuali restrizioni di
    età.

    Nel caso in cui un soggetto venga bannato gli unici dati che verranno mantenuti saranno quelli per consentirne
    l’allontanamento dal sito fin quando sarà ritenuto necessario dalla pena e, solo in questo caso, non potrà essere
    richiesta la totale cancellazione dei dati, ma solo una parziale
</p>
@endsection

@section('footer')
@if ($errors->any())
<script>
document.querySelector('.modal').className = 'off';
</script>
<div class="alert alert-danger">
<div class="modal">
        <div class="modal_body">
            <img src="/img/errorw.png" alt="" id='sfondoModal'>
            <div class="closeModal"><button>&times</button></div>


            <div class="content">
                <div class="title">
                    <h1>Errore durante la registrazione <h1>
                </div>
                <div class="text"> <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul></div>
              
            </div>
        </div>
    </div>

</div>
@endif
@endsection