@component('mail::message')
#  Registrazione Avvenuta

Benvenuto dallo staff dello GDR , ti auguriamo buona permanenza
<br>Qui ti ricordiamo le tue credenziali
<br>
    Name: {{ $NameUser ?? '' }}
    <br>
    Password: {{ $PasswordGenerata ?? '' }}

@component('mail::button', ['url' => route('welcome')])
Inizia a giocare
@endcomponent

Thanks,<br>
Staff di Destiny Rim
@endcomponent
