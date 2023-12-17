@extends('site.layouts.layout')
@section('content')
<div class="container py-5">
    <div class='evento'>
        <p><strong>Nome Do Evento: </strong>{{$evento->nome}}</p>
        <p><strong>Descrição: </strong>{{$evento->descricao}}</p>
        <p><strong>Edição: </strong>{{$evento->edicao}}</p>
        <p><strong>Endereço: </strong>{{$evento->endereco}}</p>
        <p><strong>Site: </strong>{{$evento->site}}</p>
        <p><strong>Início: </strong>{{$evento->data_inicio}}</p>
        <p><strong>Término: </strong>{{$evento->data_fim}}</p>
    </div>
    <div class='atividades'>
        <p><strong>Atividades:</strong></p>
        <!-- {{$atividade}} -->
        @foreach($atividade as $valor)
            <p>Nome: {{$valor->nome}}</p>
            <p>Descrição:</p>
            <p>{{$valor->descricao}}</p>
        @endforeach
    </div>
    <div class="comites">
        <p><strong>Comites:</strong></p>

        @foreach($comite as $dado_comite)
            <h6><strong>{{$dado_comite->nome}}</strong></h6>
            @for($i=0; $i < count($comite_organizador); $i++)
                @for($j = 0; $j < count($comite_organizador[$i]); $j++)
                    @for($k = 0; $k < count($organizador); $k++)
                        @if($comite_organizador[$i][$j]->organizador_id == $organizador[$k][0]->id && $comite_organizador[$i][$j]->comite_id == $dado_comite->id)
                        <p>{{$organizador[$k][0]->nome}}</p>
                        @endif
                    @endfor
                @endfor
            @endfor
        @endforeach
    </div>
    <div>
        <form action='{{route("participarEvento")}}' method="POST">
            @csrf
            <input type='hidden' name='idEvento' id='idEvento' value='{{$evento->id}}'>
            <input type='submit' class='btn btn-primary' value='Quero Participar!'>    
        </form>
    </div>
    <br>
    <div>
        <a href='{{route("colaborarAtividade", ["evento_id"=>$evento->id, "participante_id"=>session("idUsuario")])}}'><button class='btn btn-primary'>Quero Colaborar!</button></a>
    </div>
</div>
@endsection