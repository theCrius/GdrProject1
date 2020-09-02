<link rel="stylesheet" href="/css/SitoFacciaInterna/schedaPg.css">
<div class="modal_body">
    <img src="/img/imgHomeInterna/home/sfondobg.png" id="sfondoModal">
    <div id="modalHeader">
        @if(!$errors)
            @yield('header')
        @endif
        <div class="closeModal"><img src="/img/imgHomeInterna/home/chiudischeda.png"></div>
    </div>
    <div class="content">
        @if(!$errors)
            @yield('content')
        @else
            <h1 id='titleError'>Errore, non puoi accedere ai servizi </h1>
            <p id='contentError'>{{$errors}}</p>
        @endif

    </div>
    <div class="footerModal">
        @if(!$errors)
        @yield('footer')
        @endif
    </div>
</div>