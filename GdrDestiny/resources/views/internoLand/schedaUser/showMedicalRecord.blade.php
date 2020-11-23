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
                <div class="descrizioneFeriteMiddle">
                    <img src="/img/imgHomeInterna/home/schedaPg/MedicalRecord/centralriq.png" alt="">
                    <div class="textInRiquadro"></div>
                </div>
            </div>
            <div class="middleSubRiquadro Sub">
                <img src="/img/imgHomeInterna/home/schedaPg/MedicalRecord/Partilese/{{$user->sesso}}/total.png" alt="" id='totalBody'>

            </div>
            <div class="rightSubRiquadro Sub">

            </div>
            </div>
    </div>
</div>

    
@endsection
