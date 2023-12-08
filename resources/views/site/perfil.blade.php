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
        
        <div class="rotaOrganizador">            
            <p><a href="{{ route('formEvent') }}">Criar Novo Evento:+</a></p>
        </div>

        <div class="eventoAtual">
            <p><strong>Meu Evento: </strong><a href='{{route("showEvent")}}'>{{session('nomeEvento')}}</a></p>
        </div>
        
        <div class="minhasInscricoes">
            <p><a href="{{route('showInscricao')}}">Minhas Inscricões</a></p>
        </div>
    </div>
   
    
</div>
<script src="../../js/perfil.js"></script>
@endsection