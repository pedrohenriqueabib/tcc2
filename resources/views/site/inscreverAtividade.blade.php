@extends('site.layouts.layout')
@section('content')
<div class="container py-5">
    {{session('idUsuario')}}
    <p><strong>Evento:</strong> {{$evento_nome->nome}}</p>
    <table class="table table-bordered table-striped mb-none dataTable no-footer" id="datatable-default" role="grid" aria-describedby="datatable-default_info">
        <thead>
            <tr>
                <th class="sorting" tabindex="0" aria-controls="datatable-default" rowspan="1" colspan="1" aria-label="Nome: " style="width: 206.328px;">Nome</th>
                <th class="sorting" tabindex="0" aria-controls="datatable-default" rowspan="1" colspan="1" aria-label="Descrição: " style="width: 206.328px;">Descrição</th>
                <th class="sorting" tabindex="0" aria-controls="datatable-default" rowspan="1" colspan="1" aria-label="Area: " style="width: 206.328px;">Area</th>
                <th class="sorting" tabindex="0" aria-controls="datatable-default" rowspan="1" colspan="1" aria-label="Subarea: " style="width: 206.328px;">Subarea</th>
                <th class="sorting" tabindex="0" aria-controls="datatable-default" rowspan="1" colspan="1" aria-label="Ação: " style="width: 206.328px;">Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach($atividades as $valor)
                <tr>
                    <td>{{$valor->nome}}</td>
                    <td>{{$valor->descricao}}</td>
                    <td>{{$valor->area}}</td>          
                    <td>{{$valor->subarea}}</td>
                    <td>
                        <form action="{{route('inscreverEmAtividade')}}" method='POST'>
                            @csrf
                            <input type="hidden" value='{{$evento_id}}' name='evento_id'>
                            <input type="hidden" value='{{$valor->id}}' name='atividade_id'>
                            <input type="submit" value='Inscrever' class='btn btn-link'>
                        </form>
                    </td>
                </tr>
            @endforeach 
        </tbody>
    </table>
    
</div>
@endsection