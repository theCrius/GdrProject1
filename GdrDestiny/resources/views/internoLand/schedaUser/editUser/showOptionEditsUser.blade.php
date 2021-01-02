@extends('../layouts.appModalInterno')

@section('content')
    <div class="displayFlexRow">
    <div class="column1" onclick='modal.openModal("{{ route("editUser1",$idUser) }}",null,"schedaPg/editUser/editUser1.js")'>
        <div class="card front"><h1>Modifica Impostazioni <br>Account</h1></div>
        <div class="card retro">
            <h6>Email</h6>
            <h6>Password</h6>
            <h6>Immagine avatar e miniavatar</h6>
            <h6>Immagine Mecha</h6>
    </div>
    </div>
    <div class="column2" onclick='modal.openModal("{{ route("editUser2",$idUser) }}",null,"schedaPg/editUser/editUser2.js")'>
        <div class="card front"><h1>Cambia Pg</h1></div>
        <div class="card retro">
            <h6>Cambia Classe, skill e nome del Pg perdendo 1/4 dei tuoi EXP </h6>
    </div>
    </div>
    </div>

@endsection