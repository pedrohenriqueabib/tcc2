@extends('site.layouts.layout')
@section('content')
@if(!session()->has('token'))
<script>
    window.location.href = '/login';
</script>
@endif
    <div class="container py-5">
        <form action="{{route('salvarComite')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="organizador" class="form-label">Organizador:</label>
                <input type="text" name='organizador' id="organizador" value='{{session("nomeUsuario")}}' style="width:50%" class="form-control" disabled>
                <input type="hidden" name='organizador_id' id="organizador" value='{{session("idUsuario")}}' style="width:50%" class="form-control" >
            </div>
            <div class="mb-3">
                <label for="organizacao" class="form-label">Organização:</label>
                <input type="text" name='organizacao' id="organizacao" value='{{$organizacao->nome}}' style="width:50%" class="form-control" disabled>
                <input type="hidden" name='organizacao_id' id="organizacao" value='{{$organizacao->id}}' style="width:50%" class="form-control">
            </div>
            <div class="mb-3">
                <label for="nomeComite" class="form-label">Nome do Comite:*</label>
                <input type="text" style="width:50%" class="form-control" id="nomeComite" name='nomeComite' >
            </div>
            <div class="mb-3">
                <label for="descricaoComite" class="form-label">Descrição do Comite:*</label>
                <input type="text" style="width:50%" class="form-control" id="descricaoComite" name='descricaoComite' >
            </div>
            <div class="mb-3 ">
                <label for="descricaoComite" class="form-label">Adicionar Membros:*</label>
                <!-- <input type="text" style="width:50%" class="form-control" id="descricaoComite" name='descricaoComite' > -->
                <select id='adicionarMembros'>
                    <option selected disabled>Selecionar</option>
                    @foreach($organizador as $valor)
                        <option value="{{$valor->id}}+{{$valor->nome}}">{{$valor->nome}}</option>
                    @endforeach
                </select>
            </div>
            <div >
                <p>Membros Selecionados:</p>
                <table class="table table-bordered table-striped mb-none dataTable no-footer" id="datatable-default" role="grid" aria-describedby="datatable-default_info" style="width: 50%;">
					<thead>
                        <tr class="sorting" >
                            <th >Nome:</th>
                        </tr>
                    </thead>
					<tbody class="listaMembros">
                    </tbody>
                </table>
            </div>
            <input type='hidden' value='' id="membros" name='membros'>

            
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-primary">Resetar</button>
        </form>
    </div>
    <script src='../../js/comite.js'><script>
@endsection