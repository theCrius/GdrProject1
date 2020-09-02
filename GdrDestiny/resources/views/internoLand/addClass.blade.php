@extends('layouts.appModalInterno')
@section('content')
<div class="chooseClass">
    <form action="{{route('storeClass')}}" method="post">
        @csrf 
        @method('POST')
<img src="/img/imgHomeInterna/home/Classi/scegliclasse.png" alt="" id='title'>
<div class="selectClass">
@foreach($classes as $class)
    @if(count($userClasses) == 1) 
        @if ($userClasses[0]->id_classe == $class->id) 
            @continue
        @endif
    @endif
    <input  type="radio" id='{{$class->name}}' name="class" value="{{$class->id}}" />
    <label class="classToSelect" for="{{$class->name}}">
        <img src="/img/imgHomeInterna/home/Classi/{{$class->immagine}}" alt=""></li>
    </label>
    
@endforeach
</div>

<button type="submit" id='conferma'><span><img src="/img/imgHomeInterna/home/Classi/confermaclasse.png" alt=""></span></button>
</form>
</div>
@endsection