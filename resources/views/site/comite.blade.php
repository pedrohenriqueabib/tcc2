@extends('site.layouts.layout')
@section('content')
<!-- {{$comite}} -->
<div class="container py-5">    
    <p><strong>Evento pertencente:</strong> <a href="{{route('showEvent', ['id'=>$evento->id])}}">{{$evento->nome}}</a></p>
        <form action="{{route('editarComite')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nomecomite" class="form-label">Nome:*</label>
                <input type="text" value='{{$comite->nome}}' name="nomecomite" style="width:50%" class="form-control desabilitado" id="nomecomite" disabled>
                <input type='hidden' value='{{$comite->id}}' name='idcomite' id='idcomite'>
                <input type="hidden" name="idEvento" value='{{$evento->id}}'>
                <!-- <input type='hidden' value='{{$comite->id}}' name='idOrganizacao' id='idOrganizacao'> -->
            </div>
            <div class="mb-3">
                <label for="descricao" class="form-label">Descricao:*</label>
                <div>
                    <textarea name="descricaocomite" class='desabilitado' id="descricaocomite" cols="80" rows="" disabled>{{$comite->descricao}}</textarea>
                </div>
            </div>
            
            <div>
                <p><a href='{{route("showMembrosComite", ["id"=>$comite->id, "evento_id"=>$evento->id])}}' >Exibir Membros do Comitê</a></p>
            </div>

            <input type='button' id='editar' class="btn btn-primary" value='Editar'>
            <input id='salvar' type="submit" style='display:none' class="btn btn-primary" value='Salvar'>
            <input id='cancelar' type="reset" style='display:none' class="btn btn-primary" value='Cancelar'>
        </form>
    </div>
    <script src="../../../js/editarComite.js"></script>
@endsection