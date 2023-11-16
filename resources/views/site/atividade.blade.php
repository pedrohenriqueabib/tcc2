@extends('site.layouts.layout')
@section('content')
<div class="container py-5">
        <form action="{{route('controleCriarAtividade')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="nomeAtividade" class="form-label">Nome:*</label>
                <input type="text" name="nomeAtividade" style="width:50%" class="form-control" id="nomeAtividade" >
            </div>
            <div class="mb-3">
                <label for="descricao" class="form-label">Descricao:*</label>
                <div>
                    <textarea name="descricaoAtividade" id="descricaoAtividade" cols="80" rows=""></textarea>
                </div>
            </div>
            <div class="mb-3">
                <label for="area" class="form-label">Area:*</label>
                <input type="text" name="area" style="width:50%" class="form-control" id="area" >
            </div>
            <div class="mb-3">
                <label for="subarea" class="form-label">Subarea:*</label>
                <input type="text" name="subarea" style="width:50%" class="form-control" id="subarea" >
            </div>
            <div class="mb-3">
                <label for="cargaHoraria" class="form-label">Carga Horária:*</label>
                <input type="text" name="cargaHoraria" style="width:50%" class="form-control" id="cargaHoraria" >
            </div>
            
            <!-- <div class="mb-3">
                <label for="dataAtividade" class="form-label">Data da Atividade:</label>
                <input type="date" style="width:11%" class="form-control" id="dataAtividade">
            </div>
            <div class="mb-3">
                <label for="horaInicioAtividade" class="form-label">Início:</label>
                <input type="time" style="width:10%" class="form-control" id="horaInicioAtividade">
                <label for="horaTérminoAtividade" class="form-label">Término:</label>
                <input type="time" style="width:10%" class="form-control" id="horaTerminoAtividade">
            </div> -->

            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-primary">Resetar</button>
        </form>
    </div>
@endsection