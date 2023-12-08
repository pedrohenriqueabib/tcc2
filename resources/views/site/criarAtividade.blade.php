@extends('site.layouts.layout')
@section('content')
<div class="container py-5">
        <form action="{{route('salvarAtividade')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="eventoAtividade" class="form-label">Evento da Atividade:*</label>
                A implementar
                
                <input type="text" name="eventoAtividade" value="{{$evento->nome}}" style="width:50%" class="form-control" id="eventoAtividade" disabled>
                <input type="hidden" name="eventoId" value="{{$evento->id}}" style="width:50%" class="form-control" id="eventoId">
                
            </div>
            <div class="mb-3">
                <label for="nomeAtividade" class="form-label">Nome da Atividade:*</label>
                <input type="text" name="nomeAtividade" style="width:50%" class="form-control" id="nomeAtividade" >
            </div>
            <div class="mb-3">
                <label for="responsavel" class="form-label">Responsavel:*</label>
                <select name="responsavelAtividade" id="responsavelAtividade">
                    <option selected disabled>Selecionar</option>
                    @foreach( $responsavel as $valor)
                        <option value="{{$valor->id}}">{{$valor->nome}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="descricao" class="form-label">Descricao da Atividade:*</label>
                <div>
                    <textarea name="descricaoAtividade" id="descricaoAtividade" cols="80" rows=""></textarea>
                </div>
            </div>
            <div class="mb-3">
                <label for="palavrasChaves" class="form-label">Palavras Chaves:*</label>
                <input type="text" name="palavrasChaves" style="width:50%" class="form-control" id="palavrasChaves" >
            </div>
            <div class="mb-3">
                <label for="areaAtividade" class="form-label">Area da Atividade:*</label>
                <input type="text" name="areaAtividade" style="width:50%" class="form-control" id="areaAtividade" >
            </div>
            <div class="mb-3">
                <label for="subareaAtividade" class="form-label">Subarea da Atividade:*</label>
                <input type="text" name="subareaAtividade" style="width:50%" class="form-control" id="subareaAtividade" >
            </div>
            <div class="mb-3">
                <label for="cargaHoraria" class="form-label">Carga Horaria:*</label>
                <input type="text" name="cargaHoraria" style="width:8%" class="form-control" id="cargaHoraria" >
            </div>

            <button type="submit" class="btn btn-primary">Criar Atividade</button>
            <button type="reset" class="btn btn-primary">Resetar</button>
        </form>
    </div>
@endsection