@extends('site.layouts.layout')
@section('content')
<div class="container py-5">
    <div>
        <p><strong>Tipo: </strong>{{session('tipoPerfil')}}</p>
        <input type="hidden" value="{{session('tipoPerfil')}}" id="tipoPerfil" />
        <p><strong>Nome: </strong>{{session('userName')}}</p>
        <p><strong>Email: </strong>{{session('userEmail')}}</p>
        <!-- <p><strong>Meus Eventos:<a href="{{route('site.criarEvento')}}">+</a></strong></p> -->
        <div class="caixa">
            
        </div>
    </div>
   
    
</div>
<script src="./js/perfil.js"></script>
@endsection