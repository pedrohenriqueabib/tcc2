@extends('site.layouts.layout')
@section('content')
<div class="container py-5">
    <div>
        <p><strong>Tipo: </strong>{{session('tipoPerfil')}}</p>
        <input type="hidden" value="{{session('tipoPerfil')}}" id="tipoPerfil" />
        <p><strong>Nome: </strong>{{session('nomeUsuario')}}</p>
        <p><strong>Email: </strong>{{session('emailUsuario')}}</p>
        <div class="caixa">
            
        </div>
        
        @if(!$evento)
        <div class="rotaOrganizador">            
            <p><a href="{{ route('formEvent') }}">Criar Evento:+</a></p>
        </div>
        @else
        <div>            
            <p><strong>Evento: </strong>{{$evento->nome}}</p>
        </div>
        @endif

    </div>
   
    
</div>
<script src="./js/perfil.js"></script>
@endsection