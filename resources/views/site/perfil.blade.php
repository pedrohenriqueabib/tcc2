@extends('site.layouts.layout')
@section('content')
<div class="container py-5">
    <p><strong>Nome: </strong>{{session('nome')}}</p>
    <p><strong>Nome: </strong>{{session('email')}}</p>
    <p><strong>Meus Eventos:<a href="{{route('site.criarEvento')}}">+</a></strong></p>
   
    
</div>
@endsection