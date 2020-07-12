@extends('./layouts/appIscrizione')
@section('content')

    <form action="{{route('register',['razza' => $RazzaId,'emisfero' => $EmisferoId,'sesso' => $Sesso])}}" method="POST"
        id="form1">
        @csrf
        <div class="DivPrincipale">
            <img class='sfondoRegistrazione1' src="/img/imgHomeEsterna/imgIscrizione/Fase1.png" alt="">
            <input type="text" name="name" class='inputTextRegistrazione' id='firstChild'>
            <input type="text" name="cognome" class='inputTextRegistrazione' id='secondChild'>
            <input type="text" name="email" class='inputTextRegistrazione' id='thirdChild'>
            <input type="text" name="nazionalità" class='inputTextRegistrazione' id='fourthChild'>
            <button type="submit" id='entra' form="form1"><img src="/img/imgHomeEsterna/imgIscrizione/siclick.png"
                    alt=""></button>
        </div>
    </form>
@endsection