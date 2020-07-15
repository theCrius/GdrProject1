@extends('./layouts/appIscrizione')
@section('content')
    <div class="DivPrincipale">
    
        <img class='sfondo' src="/img/imgHomeEsterna/imgIscrizione/fasesesso.png" alt="">
        <a href="{{route('registrati4',[$RazzaId,$EmisferoId,'f'])}}"><img id='femmina' src="/img/imgHomeEsterna/imgIscrizione/femmina1.png" alt=""></a>
        <a href="{{route('registrati4',[$RazzaId,$EmisferoId,'m'])}}"><img id='maschio' src="/img/imgHomeEsterna/imgIscrizione/maschio1.png" alt=""></a>

      
    </div>
@endsection


@section('titleModal')

Sesso del tuo personaggio

@endsection

@section('contentModal')
<p>
Excepteur ut culpa ad id. Irure irure officia exercitation cillum ad exercitation ad aliquip id dolor ipsum aute consectetur aliqua. Cupidatat non magna irure magna aliqua dolore ad sit. Eu dolor consectetur cillum esse incididunt reprehenderit in. Irure sint minim cupidatat consectetur ipsum reprehenderit. Pariatur id aute consequat labore eu proident cupidatat.

Ex eiusmod adipisicing non sint aliquip cillum pariatur ex sit non aliquip voluptate. Occaecat nisi ut fugiat aliqua dolore laboris ullamco irure nisi ut qui. Laborum cupidatat ut et sit. Fugiat sit laboris ipsum cillum. Dolor amet aute consequat do Lorem est anim duis qui proident velit duis esse id.

Do dolore cupidatat amet consectetur consequat cillum et. Esse proident deserunt incididunt exercitation veniam in sunt aliquip occaecat consequat reprehenderit. Quis est pariatur do sunt Lorem nulla.

Elit ex cillum consequat cillum nostrud veniam. Consectetur sunt nulla amet consectetur consectetur aliquip pariatur tempor velit reprehenderit fugiat dolore veniam. Qui commodo ullamco incididunt do irure cupidatat sit magna pariatur.

Incididunt fugiat laboris velit nulla nisi reprehenderit quis esse aute in excepteur non. Et aliqua sint non nostrud nulla est consectetur aute mollit et. Amet culpa consectetur culpa tempor id tempor commodo cupidatat eu non amet non deserunt dolor. Tempor fugiat tempor aute qui elit aliqua ea consequat proident incididunt fugiat nostrud. Ipsum est ullamco ullamco et ex ea enim eu cupidatat ipsum ea. Quis qui aliquip exercitation enim exercitation esse culpa id occaecat ullamco cupidatat nulla.

Incididunt anim esse excepteur nisi ipsum. Aute enim cupidatat irure sit deserunt amet consectetur proident ut. Dolor proident cillum nulla anim qui. Sint velit cupidatat ad est nostrud et.
</p>
@endsection