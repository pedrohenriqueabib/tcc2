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
        
        <div class="rotaOrganizador" style='display:none'>            
            <p><a href="{{ route('formEvent') }}">Criar Novo Evento:+</a></p>
        </div>

        <div class="eventoAtual" style='display:none'>
        @if(!empty($evento) && isset($evento))
            <p><strong>Meus Eventos: </strong></p>
            @foreach($evento as $valor)
                @foreach($valor as $value)
                    <a href='{{route("showEvent", ["id"=>$value->id])}}'>{{$value->nome}}</a>
                @endforeach
            @endforeach
        @endif
        </div>
        
        <div class="minhasInscricoes" style='display:none'>
            <p><a href="{{route('showInscricao')}}">Minhas Inscricões</a></p>
        </div>
    </div>
   
    
</div>
<script src="../../js/perfil.js"></script>
@endsection