@extends('./layouts/appAmbientazioneRegolamento')

@section('leftBox')

            @for($i=0;$i < count($ambientazioneText ?? ''); $i++) 
            <h1 id='{{ $ambientazioneTitle[$i] }}'>{{ $ambientazioneTitle[$i] }}</h1>
                <p>
                    {{$ambientazioneText ?? ''[$i]}}
                </p>
                @endfor
@endsection
@section('rightBox')
                    @for($i=0;$i < count($ambientazioneTitle); $i++) 
                    <li><a href='#{{ $ambientazioneTitle[$i] }}'>{{ $ambientazioneTitle[$i] }}</a></li>
                       
                    @endfor
@endsection