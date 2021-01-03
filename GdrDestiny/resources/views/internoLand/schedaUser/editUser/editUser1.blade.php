@extends('../layouts.appModalInterno')

@section('content')
<div class="displayFlexColumn">
    <div class="firstRow">
        <div><h1>Modifica Impostazione Account</h1></div>
    </div>
    
<form action="{{ route('updateUser1',$user->id) }}" method="post" id='editUser1' class='displayFlexRow secondRow'>
       @csrf 
       @method('put')
        <div class="displayFlexColumn left">
            <input type="email" name='email' placeholder="Email : {{ $user->email }}" >
            <input type="password" name='password' placeholder="New Password">
            <input type="text" name='immagine_mecha' placeholder="Link Immagine Mecha : {{ $user->mecha->immagine }}">
        </div>
        <div class="displayFlexColumn right">
        <input type="text" name='immagine_avatar' placeholder="Link immagine avatar : {{ $user->immagine_avatar }}">
        <input type="text" name='immagine_miniavatar' placeholder="Link immagine mini-avatar : {{ $user->immagine_miniavatar }}">
            <input type="text" name='data_di_nascita' placeholder="Data di Nascita Pg xxxx-xx-xx : {{ $user->data_di_nascita }}">
        </div>
        <div class="thirdRow">
            <button>Invia Modifiche</button>
        </div>
    </div>    
    </form>
    
</div>
@endsection