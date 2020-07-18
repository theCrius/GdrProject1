@component('mail::layout')
{{-- Header --}}
@slot('header')
@component('mail::header', ['url' => config('app.url')])
Header Title
@endcomponent
@endslot

{{-- Body --}}
# Registrazione Avvenuta

<br>Grazie per esserti iscritto a Destiny Rim, di seguito troverai i dati necessari per poter entrare all interno della
land:
<br>
Name: {{ $NameUser ?? '' }}
<br>
Password: {{ $PasswordGenerata ?? '' }}
@component('mail::button', ['url' => route('welcome')])
Inizia a giocare
@endcomponent
<br>
Una volta fatto il primo accesso potrai cambiare la password. 
<br>
Buon Gioco

{{-- Footer --}}
@slot('footer')
@component('mail::footer')
© {{ date('Y') }} {{ Destiny Rim }}
@endcomponent
@endslot
@endcomponent