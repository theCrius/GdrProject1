<link rel="stylesheet" href="/css/SitoFacciaInterna/schedaPg.css">
<div class="modal_body">
    <img src="/img/imgHomeInterna/home/sfondobg.png" id="sfondoModal">
    <div id="modalHeader">
            @yield('header')
        <div class="closeModal"><img src="/img/imgHomeInterna/home/chiudischeda.png"></div>
    </div>
    <div class="content">
   
    @if($errors)
  @php
  echo '2332';
    echo "<script>
     document.addEventListener('DOMContentLoaded', function() {
        let test=new Box(document.querySelector('.modal'));
        console.log('ok')}, false)
        
            </script> ";
    @endphp
    @endif
    @yield('content')
   
    </div>
    <div class="footerModal">
        @yield('footer')
     
    </div>


</div>