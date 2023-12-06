@extends('site.layouts.layout')
@section('content')
<div class="container py-5">
    <p><strong>Nome da atividade:</strong> {{$atividade[0]->nome}}
    <p><a href='{{route("criarHorario", ["id"=>$idAtividade])}}'>Adicionar Horário:+</a></p>

    @foreach($atividade_horario as $valor)
    <p><strong>Local: </strong>{{$valor->local->nome}}</p>
    <p><strong>Pavimento: </strong>{{$valor->local->pavimento}}</p>
    <p><strong>Bloco: </strong>{{$valor->local->bloco}}</p>
    @php 
        $dataInicio = new DateTime($valor->horario->inicio);
        $dataInicio = $dataInicio->format('d/m/Y');
        
        $dataFim = new DateTime($valor->horario->fim);
        $dataFim = $dataFim->format('d/m/Y');
    @endphp
    <p><strong>Início: </strong>{{$dataInicio}}</p>
    <p><strong>Término: </strong>{{$dataFim}}</p>
    <p><strong>Dia da Semana: </strong>{{$valor->horario->dia_semana}}</p>
    <p><strong>Carga Horária: </strong>{{$valor->horario->carga_horaria}}</p>
    <p>----------------------------------------------------------------------------------------------</p>
    @endforeach
    </div>
@endsection