@extends('../layouts.appModalInterno')
@section('content')
<div class="equipOwnedContent centerToAbsolutePosition">
      
        @for($i=0;$i < 32; $i++)
        <div class="owned">
            <img src="/img/imgHomeInterna/home/schedaPg/ObjectsEquipped/qoggetto.png" alt="" id='riquadroObjectOwned'>

        </div>
        @endfor
    </div>
    </div>
@endsection