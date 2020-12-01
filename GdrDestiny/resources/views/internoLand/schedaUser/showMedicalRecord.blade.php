@extends('../layouts.appModalInterno')
@section('content')
<div class='contentSub'>
    <div class="button">
        <img src="/img/imgHomeInterna/home/schedaPg/MedicalRecord/symbolxsx.png" alt="" id='immagineMedicalRecordLeft'>
       
    </div>

    <div class="riquadroDestra parentRelative">
        <img src="/img/imgHomeInterna/home/schedaPg/background/backsfondobac.png" id='riquadroImmagineMedicalRecord' alt="">
        <div class="titleBackground" id='titleMedicalRecord'>
            <img src="/img/imgHomeInterna/home/schedaPg/MedicalRecord/cartellaclinica.png" alt="" >
        </div>
        <div class="contentRiquadroDestro">
            <div class="leftSubRiquadro Sub">
                <div class="descrizioneFerite">
                    <img src="/img/imgHomeInterna/home/schedaPg/MedicalRecord/centralriq.png" alt="" class='boxFerite'>
                    <div class="textInRiquadro boxShadow">
                        
                            <div class="title">
                                <img src="/img/imgHomeInterna/home/schedaPg/MedicalRecord/partecentrale.png" alt="">
                            </div>
                            <div class="hurts">

                                @for($i=0;$i < ( count ($medicalrecords['middle']) - 1)  ; $i++)

                            <p>{{ $medicalrecords['middle'][$i]['descrizione'] . ' :' . $medicalrecords['middle'][$i]['danno'] }}</p>
                             @endfor
                                <p id='lastModifica'><i>Ultima modifica: {{$medicalrecords['middle']['last_modifica'] ?? ''}} </i></p>
                            </div>
                        
                    </div>
                </div>
            </div>
            <div class="middleSubRiquadro Sub">
                <img src="/img/imgHomeInterna/home/schedaPg/MedicalRecord/Partilese/{{$user->sesso}}/total.png" alt="" id='totalBody'>
                @if($medicalrecords['top'])
                    <div class="riquadroParteLesa Top{{$user->sesso }}">
                    <img src="/img/imgHomeInterna/home/schedaPg/MedicalRecord/Partilese/{{$user->sesso}}/top.png" alt="" >
                    </div>
                @endif

                @if($medicalrecords['middle'])
                    <div class="riquadroParteLesa Middle{{$user->sesso }}">
                    <img src="/img/imgHomeInterna/home/schedaPg/MedicalRecord/Partilese/{{$user->sesso}}/middle.png" alt="" >
                    </div>
                @endif

                @if($medicalrecords['bottom'])
                <div class="riquadroParteLesa Bottom{{$user->sesso }}">
                    <img src="/img/imgHomeInterna/home/schedaPg/MedicalRecord/Partilese/{{$user->sesso}}/bottom.png" alt="" >
                    </div>
                @endif
            </div>
            <div class="rightSubRiquadro Sub">
            <div class="descrizioneFerite">
                <img src="/img/imgHomeInterna/home/schedaPg/MedicalRecord/centralriq.png" alt="" class='boxFerite'>
                    <div class="textInRiquadro">
                        <div class="title">
                            <img src="/img/imgHomeInterna/home/schedaPg/MedicalRecord/partesuperiore.png" alt="">
                        </div>
                        <div class="hurts">
                        
                            @for($i=0;$i < ( count($medicalrecords['top']) - 1) ; $i++)
                            <p>{{ $medicalrecords['top'][$i]['descrizione'] . ' :' . $medicalrecords['top'][$i]['danno'] }}</p>
                             @endfor
                                <p id='lastModifica'><i>Ultima modifica: {{$medicalrecords['top']['last_modifica'] ?? ''}} </i></p>
                            
                        </div>
                    </div>
            </div>
            <div class="descrizioneFerite">
                <img src="/img/imgHomeInterna/home/schedaPg/MedicalRecord/centralriq.png" alt="" class='boxFerite'>
                    <div class="textInRiquadro">
                            <div class="title">
                                <img src="/img/imgHomeInterna/home/schedaPg/MedicalRecord/parteinferiore.png" alt="">
                            </div>
                        <div class="hurts">
                        
                            @for($i=0;$i < ( count ($medicalrecords['bottom']) - 1)  ; $i++)
                            <p>{{ $medicalrecords['bottom'][$i]['descrizione'] . ' :' . $medicalrecords['bottom'][$i]['danno'] }}</p>
                             @endfor
                                <p id='lastModifica'><i>Ultima modifica: {{$medicalrecords['bottom']['last_modifica'] ?? ''}} </i></p>
                            
                        </div>

                    </div>
            </div>
            </div>
            </div>
    </div>
</div>

    
@endsection
