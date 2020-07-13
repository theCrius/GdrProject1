@extends('./layouts/appAmbientazioneRegolamento')
@section('content')
<div class="container">
    <img src="/img/imgHomeEsterna/imgIscrizione/sfondoiscrizifine.png" alt="" class='sfondo'>
    <div class="body">
        <div class="left">
            @for($i=0;$i < count($ambientazioneText); $i++) 
            <h1 id='{{ $ambientazioneTitle[$i] }}'>{{ $ambientazioneTitle[$i] }}</h1>
                <p>
                    {{$ambientazioneText[$i]}}
                </p>
                @endfor
        </div>
        <div class="right">
            <img src="/img/imgHomeEsterna/finestradxiscri.png" alt="">

            <div class="lista">
                <ul id='listPrincipale'>
                    @for($i=0;$i < count($ambientazioneTitle); $i++) 
                    <li><a href='#{{ $ambientazioneTitle[$i] }}'>{{ $ambientazioneTitle[$i] }}</a></li>
                       
                    @endfor
                </ul>
            </div>
        </div>

    </div>
</div>
@endsection