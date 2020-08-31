@extends('layouts.appModalInterno')
@section('content')
<div class="chooseClass">
    <form action="{{route('storeClass')}}" method="post">
        @csrf 
        @method('POST')
<img src="/img/imgHomeInterna/home/Classi/scegliclasse.png" alt="" id='title'>
<div class="selectClass">
@foreach($classes as $class)
    @if(!in_array($class->id,$userClasses))

    <input  type="radio" id='{{$class->name}}' name="class" value="{{$class->id}}" />
    <label class="classToSelect" for="{{$class->name}}">
        <img src="/img/imgHomeInterna/home/Classi/{{$class->immagine}}" alt=""></li>
    </label>
    @endif
@endforeach
</div>

<button type="submit" id='entra'><span><img src="/img/imgHomeInterna/home/Classi/confermaclasse.png" alt=""></span></button>
</form>
</div>
@endsection