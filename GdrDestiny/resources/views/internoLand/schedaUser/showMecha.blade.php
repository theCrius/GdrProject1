@extends('../layouts.appModalInterno')
@section('header')
<div class='editProfile'><h5>dfdfsds</h5></div>


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
            <div class="boxContent">
                <div class="descrizione"></div>
                <div class="image">
                    <img src="" alt="">
                    <div>
                        <img src="" alt="">
                    </div>
                </div>
            </div>
        </div>
    @endfor
</div>
<div class="center"></div>
<div class="right">
@for($i=0; $i < 5; $i++ )
        <div class="boxChild">
            <img src="/img/imgHomeInterna/home/schedaPg/mecha/dxspazi.png" class='sfondoBox' alt="">
            <div class="boxTitle dx">
                <h6>fejdj</h6>
            </div>
            <div class="boxContent">
                <div class="descrizione"></div>
                <div class="image">
                    <img src="" alt="">
                    <div>
                        <img src="" alt="">
                    </div>
                </div>
            </div>
        </div>
    @endfor
</div>
</div>
@endsection