@extends('site.layouts.layout')
@section('content')

<div class="container py-5">
    <p><strong>Nome da atividade:</strong> <a href='{{route("showAtividade", ["id"=>$atividade[0]->id])}}'>{{$atividade[0]->nome}}</a>
    <p><a href='{{route("criarHorario", ["id"=>$idAtividade])}}'>Adicionar Horário:+</a></p>

    <!-- @foreach($atividade_horario as $valor)
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
    @endforeach -->
    <table class="table table-bordered table-striped mb-none dataTable no-footer" id="datatable-default" role="grid" aria-describedby="datatable-default_info">
        <thead>
            <tr>
                <th class="sorting" tabindex="0" aria-controls="datatable-default" rowspan="1" colspan="1" style="width: 206.328px;">Local</th>
                <th class="sorting" tabindex="0" aria-controls="datatable-default" rowspan="1" colspan="1" style="width: 206.328px;">Pavimento</th>
                <th class="sorting" tabindex="0" aria-controls="datatable-default" rowspan="1" colspan="1" style="width: 206.328px;">Bloco</th>
                <th class="sorting" tabindex="0" aria-controls="datatable-default" rowspan="1" colspan="1" style="width: 206.328px;">Início</th>
                <th class="sorting" tabindex="0" aria-controls="datatable-default" rowspan="1" colspan="1" style="width: 206.328px;">Término</th>
                <th class="sorting" tabindex="0" aria-controls="datatable-default" rowspan="1" colspan="1" style="width: 206.328px;">Dia da Semana</th>
                <th class="sorting" tabindex="0" aria-controls="datatable-default" rowspan="1" colspan="1" style="width: 206.328px;">Carga Horária</th>
                <th class="sorting" tabindex="0" aria-controls="datatable-default" rowspan="1" colspan="1" style="width: 206.328px;">Ação</th>
            </tr>
        </thead>
        <tbody>
        @foreach($atividade_horario as $valor)
            <tr>
                <td>{{$valor->local->nome}}</td>
                <td>{{$valor->local->pavimento}}</td>
                <td>Bloco: </strong>{{$valor->local->bloco}}</td>
                @php 
                    $dataInicio = new DateTime($valor->horario->inicio);
                    $dataInicio = $dataInicio->format('d/m/Y');
                    
                    $dataFim = new DateTime($valor->horario->fim);
                    $dataFim = $dataFim->format('d/m/Y');
                @endphp
                <td>{{$dataInicio}}</td>
                <td>{{$dataFim}}</td>
                <td>{{$valor->horario->dia_semana}}</td>
                <td>{{$valor->horario->carga_horaria}}</td>
                <td>
                    <form action="" method="post">
                        <input type="submit" value="Remover">
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
@endsection