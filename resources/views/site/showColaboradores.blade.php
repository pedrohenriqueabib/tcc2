@extends('site.layouts.layout')
@section('content')
<div class="container py-5">
    <p>
        <a href="{{route('showEvent')}}">Retorna para Evento</a>
    </p>
    <div>
        <table class="table table-bordered table-striped mb-none dataTable no-footer" id="datatable-default" style='width:50%;' role="grid" aria-describedby="datatable-default_info">
            <thead>
                <tr>
                    <th>
                        Nome
                    </th>
                    <th>
                        Descrição
                    </th>
                    <th>
                        Ação
                    </th>
                </tr>
            </thead>
            <tbody>
                @for( $i = 0; $i< count($selecionados); $i++)
                    <tr>
                        <td>
                            {{$selecionados[$i][0]->nome}}
                        </td>
                        <td>
                            {{$selecionados[$i][0]->descricao}}
                        </td>
                        <td>                            
                            <form action="{{route('removerColaborador')}}" method='POST'>
                                @csrf
                                <input type="hidden" value='{{$selecionados[$i][0]->id}}' name="colaborador_id" id="colaborador_id">
                                <input type="hidden" value='{{$atividade->id}}' name="atividade_id">
                                <input type="submit" value="Remove" class='btn btn-link'>
                            </form> 
                        </td>
                    </tr>
                @endfor
            </tbody>
        </table>
    </div>
    <button id='adicionarColaborador' class="btn btn-primary">Adicionar Colaborador</button>
    <div class="colabs" style='display:none;'>
        <select name="selecionar" id="selecionar">
            <option value="Selecionar" disabled selected>Selecionar</option>
            @foreach($colaborador as $valor)
            <option value="{{$valor->id}}+{{$valor->nome}}">{{$valor->nome}}</option>
            @endforeach
        </select>
        <form action="{{route('adicionarColaborador')}}" method="POST">
            @csrf
            <input type="hidden" value='' name='listaSelect' id='listaSelect'>
            <input type='hidden' value='{{$atividade->id}}' name='idAtividade'> 
            <table class="table table-bordered table-striped mb-none dataTable no-footer" id="datatable-default" style='width:50%;' role="grid" aria-describedby="datatable-default_info">
                <thead>
                    <tr>
                        <th>
                            Selecionado
                        </th>
                    </tr>
                </thead>
                <tbody id='tabelaSelecionados'>
                                
                </tbody>
            </table>
            <input class="btn btn-primary" type="submit" value='Adicionar'>
            <input class="btn btn-primary" type='reset' value='Cancelar' id='cancelar'>
        </form>
    </div>
</div>
<script src='../../js/colaboradores.js'></script>
@endsection