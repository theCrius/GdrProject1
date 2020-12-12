@extends('../layouts.appModalInterno')
@section('header')
<div class='nameMecha'><h5>dfdfsds</h5></div>


@endsection


@section('content')
<div class="boxParent centerToAbsolute">
<div class="left">
    @for($i=0; $i < 5; $i++ )
    <div class="boxChild">
            <img src="/img/imgHomeInterna/home/schedaPg/mecha/sxspazi.png" class='sfondoBox' alt="">
            <div class="boxTitle sx">
                <h6>fejdj</h6>
            </div>
            <div class="boxContent toLeft">
                <div class="descrizione">
                    aassfdasdassdwnjosdsahKODJOAJDIOJIOAWJSIODFJOIAJFJjasjfoijaoJDOAzxczxczxcxzfbsdfbfgsdfgsvdfvsdfsdv
                </div>
                <div class="image">
                    <img src="/img/imgHomeInterna/home/schedaPg/ObjectsEquipped/qoggetto.png" alt="" class='sfondoMicroBox centerLeft'>
                    <div>
                        <img src="" alt="">
                    </div>
                </div>
            </div>
        </div>
    @endfor
</div>
<div class="center">
    <img src="" alt="">
</div>
<div class="right">
@for($i=0; $i < 5; $i++ )
        <div class="boxChild">
            <img src="/img/imgHomeInterna/home/schedaPg/mecha/dxspazi.png" class='sfondoBox' alt="">
            <div class="boxTitle dx">
                <h6>fejdj</h6>
            </div>
            <div class="boxContent toRight">
                <div class="image">
                    <img src="/img/imgHomeInterna/home/schedaPg/ObjectsEquipped/qoggetto.png" alt="" class='sfondoMicroBox centerRight'>
                    <div>
                        <img src="" alt="">
                    </div>
                </div>
                <div class="descrizione">
                    aassfdasdassd
                </div>

        </div>
    </div>
    @endfor
</div>
</div>
@endsection