@extends('site.layouts.layout')
@section('content')
<!-- {{$comite}} -->
<div class="container py-5">    
    <p><strong>Evento pertencente:</strong> <a href="{{route('showEvent')}}">{{session('nomeEvento')}}</a></p>
        <form action="" method="post">
            @csrf
            <div class="mb-3">
                <label for="nomecomite" class="form-label">Nome:*</label>
                <input type="text" value='{{$comite->nome}}' name="nomecomite" style="width:50%" class="form-control" id="nomecomite" >
                <input type='hidden' value='{{$comite->id}}' name='idcomite' id='idcomite'>
                <input type='hidden' value='{{$comite->id}}' name='idOrganizacao' id='idOrganizacao'>
            </div>
            <div class="mb-3">
                <label for="descricao" class="form-label">Descricao:*</label>
                <div>
                    <textarea name="descricaocomite" id="descricaocomite" cols="80" rows="">{{$comite->descricao}}</textarea>
                </div>
            </div>
            
            <div>
                <p><a href='{{route("showMembrosComite", ["id"=>$comite->id])}}' >Exibir Membros do Comitê</a></p>
            </div>

            <input type='button' id='editar' class="btn btn-primary" value='Editar'>
            <input id='salvar' type="submit" class="btn btn-primary" value='Salvar'>
            <input id='cancelar' type="reset" class="btn btn-primary" value='Cancelar'>
        </form>
    </div>
    <script src='../../js/editarComite.js'></script>
@endsection