@extends('site.layouts.layout')
@section('content')
<div class="container py-5">
    <p><strong>Nome:</strong>{{session('organizador')}}</p>
    <p><strong>Email:</strong>p@gmail.com</p>
    <p><strong>Meus Eventos:<a href="{{route('site.criarEvento')}}">+</a></strong></p>
    <ul>
        <li><a href="#">Evento1</a></li>
        <li><a href="#">Evento2</a></li>
        <li><a href="#">Evento3</a></li>
        <li><a href="#">Evento4</a></li>
    </ul>        
</div>
@endsection