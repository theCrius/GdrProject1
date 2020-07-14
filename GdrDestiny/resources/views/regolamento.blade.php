@extends('./layouts/appAmbientazioneRegolamento')

@section('leftBox')
    
            @for($i=0;$i < count($regolamentoText); $i++) 
            <h1 id='{{ $regolamentoTitle[$i] }}'>{{ $regolamentoTitle[$i] }}</h1>
                <p>
                    {{$regolamentoText[$i]}}
                </p>
                @endfor
    
@endsection
@section('rightBox')
                    @for($i=0;$i < count($regolamentoTitle); $i++) 
                    <li><a href='#{{ $regolamentoTitle[$i] }}'>{{ $regolamentoTitle[$i]}}</a></li>
                       
                    @endfor
@endsection