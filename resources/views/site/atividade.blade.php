@extends('site.layouts.layout')
@section('content')
<div class="container py-5">    
    @foreach($atividade as $valor)
    <p>Evento ao qual pertence: <a href='{{route("showEvent")}}'>{{$valor->evento->nome}}</a></p>
    <p>Responsável: {{$valor->responsavel->nome}}</p>
        <form action="{{route('updateAtividade')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="nomeAtividade" class="form-label">Nome:*</label>
                <input type="text" value='{{$valor->nome}}' name="nomeAtividade" style="width:50%" class="form-control" id="nomeAtividade">
                <input type='hidden' value='{{$valor->id}}' name='idAtividade' id='idAtividade'>
            </div>
            <div class="mb-3">
                <label for="descricao" class="form-label">Descricao:*</label>
                <div>
                    <textarea name="descricaoAtividade" id="descricaoAtividade" cols="80" rows="">{{$valor->descricao}}</textarea>
                </div>
            </div>
            <div class="mb-3">
                <label for="area" class="form-label">Area:*</label>
                <input type="text" value="{{$valor->area}}" name="area" style="width:50%" class="form-control" id="area" >
            </div>
            <div class="mb-3">
                <label for="subarea" class="form-label">Subarea:*</label>
                <input type="text" value='{{$valor->subarea}}' name="subarea" style="width:50%" class="form-control" id="subarea" >
            </div>
            <div class="mb-3">
                <label for="cargaHoraria" class="form-label">Carga Horária:*</label>
                <input type="text" value='{{$valor->carga_horaria}}' name="cargaHoraria" style="width:50%" class="form-control" id="cargaHoraria" >
            </div>
            <div>
                <p>
                    <a href="{{route('showAtividadeHorario', ['id'=>$valor->id])}}">Horários</a>
                </p>
                <p>
                    <a href="{{route('showColaboradores', ['id'=>$valor->id])}}">Colaboradores</a>
                </p>
            </div>
            

            <button type="button" id='editar' class="btn btn-primary">Editar</button>
            <button type="submit" id='salvar' style='display:none' class="btn btn-primary">Editar</button>
            <button type="reset" id='cancelar' style='display:none's class="btn btn-primary">Cancelar</button>
        </form>
    @endforeach
    </div>
    <script src="../../js/atividade.js"></script>
@endsection