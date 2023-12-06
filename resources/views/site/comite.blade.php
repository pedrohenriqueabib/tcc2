@extends('site.layouts.layout')
@section('content')
{{$comite}}
<div class="container py-5">    
    <p>Evento ao qual pertence: <a href=''></a></p>
    <p>Responsável: </p>
        <form action="" method="post">
            @csrf
            <div class="mb-3">
                <label for="nomeAtividade" class="form-label">Nome:*</label>
                <input type="text" value='' name="nomeAtividade" style="width:50%" class="form-control" id="nomeAtividade" >
                <input type='hidden' value='' name='idAtividade' id='idAtividade'>
            </div>
            <div class="mb-3">
                <label for="descricao" class="form-label">Descricao:*</label>
                <div>
                    <textarea name="descricaoAtividade" id="descricaoAtividade" cols="80" rows=""></textarea>
                </div>
            </div>
            <div class="mb-3">
                <label for="area" class="form-label">Area:*</label>
                <input type="text" value="" name="area" style="width:50%" class="form-control" id="area" >
            </div>
            <div class="mb-3">
                <label for="subarea" class="form-label">Subarea:*</label>
                <input type="text" value='' name="subarea" style="width:50%" class="form-control" id="subarea" >
            </div>
            <div class="mb-3">
                <label for="cargaHoraria" class="form-label">Carga Horária:*</label>
                <input type="text" value='' name="cargaHoraria" style="width:50%" class="form-control" id="cargaHoraria" >
            </div>
            <div>
                <p>a averiguar</p>
            </div>
            

            <button type="submit" class="btn btn-primary">Editar</button>
            <button type="reset" class="btn btn-primary">Resetar</button>
        </form>
    </div>
@endsection