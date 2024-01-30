@extends('site.layouts.layout')
@section('content')
<div class="container py-5">
    aquii
    <p><strong>Evento pertencente:</strong> <a href="{{route('showEvent', ['id'=>$evento->id])}}">{{$evento->nome}}</a></p>
    <p><strong>Comite pertencente:</strong> {{$comite->nome}}</p>
    <table class="table table-bordered table-striped mb-none dataTable no-footer" id="datatable-default" role="grid" aria-describedby="datatable-default_info">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Cargo</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach($organizador as $valor)
            <tr>
                <td>{{$valor[0]->nome}}</td>
                <td>{{$valor[0]->email}}</td>
                <td>{{$valor[0]->cargo}}</td>
                <td>
                    <form action="{{route('removerMembro')}}" method='POST'>
                        @csrf
                        <input type="hidden" name="organizador_id" value='{{$valor[0]->id}}'>
                        <input type="hidden" name="comite_id" value="{{$comite->id}}">
                        <input type="hidden" name="evento_id" value="{{$evento->id}}">
                        <input type="submit" value="Remover" class='btn btn-link'>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <input type='button' class='btn btn-primary' id='adicionarMembros' value='Adicionar Membros'>
    <div class="membros" style='display:none'>
        <div>
            <select id="selecionarMembro">
                <option value="Selecionar" selected disabled>Selecionar</option>
                @foreach($listaMembrosComite as $dado)
                    <option value="{{$dado->id}}+{{$dado->nome}}">{{$dado->nome}}</option>
                @endforeach
            </select>
        </div>
        <div>
            <table>
                <thead>
                    <tr>
                        <th>Selecionado</th>
                    </tr>
                </thead>
                <tbody id='corpoLista'>
                </tbody>
            </table>
        </div>
        <br>
        <form action="{{route('adicionarMembro')}}" method="post">
            @csrf 
            <input type="hidden" value='{{$comite->id}}' name='comite_id'> 
            <input type="hidden" value='{{$evento->id}}' name='evento_id'> 
            <input type="hidden" name="selecionados" id='selecionados' value=''>
            <input class='btn btn-primary' type="submit" value="Adicionar" >
            <input class='btn btn-primary' type="button" value="Cancelar" id='cancelar'>
        </form>
    </div>
</div>
<script src="../../../js/membrosComite.js"></script>
@endsection