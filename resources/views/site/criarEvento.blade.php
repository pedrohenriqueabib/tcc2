@extends('site.layouts.layout')
@section('content')
@if(!session()->has('token'))
<script>
    window.location.href = '/login';
</script>
@endif
    <div class="container py-5">
        <form action="{{route('controleCriarEvento')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="organizador" class="form-label">Organizador:</label>
                <input type="text" name='organizador' id="organizador" value='{{session("organizador")}}' style="width:50%" class="form-control" disabled>
                <input type="hidden" name="organizador_id" id="organizador_id" value="{{session('organizador_id')}}">
            </div>
            <!-- Organização -->
            <div class="mb-3">
                <label for="organizacao" class="form-label">Organização:</label>
                <input type="text" name='nomeOrganizacao' id="nomeOrganizacao" style="width:50%" class="form-control" >
            </div>
            <!-- Fim Organização -->
            <!-- Comite -->
            <div class="mb-3">
                <label for="comite" class="form-label">Comite:</label>
                <input type="text" name='comite' id="comite" style="width:50%" class="form-control" >
            </div>
            <div class="mb-3">
                <label for="descricaoComite" class="form-label">Descricao do Comite:</label>
                <input type="text" name='descricaoComite' id="descricaoComite" style="width:50%" class="form-control" >
            </div>
            <!-- Fim Comite -->            
            <div class="mb-3">
                <label for="nomeEvento" class="form-label">Nome do Evento:*</label>
                <input type="text" name='nomeEvento' style="width:50%" class="form-control" id="nomeEvento" >
            </div>
            <div class="mb-3">
                <label for="descricao" class="form-label">Descricao:*</label>
                <div>
                    <textarea name="descricao" id="descricao" cols="80" ></textarea>
                </div>
            </div>
            <div class="mb-3">
                <label for="edicao" class="form-label">Edição:*</label>
                <input type="text"  style="width:50%" class="form-control" name='edicao' id="edicao">
            </div>
            <div class="mb-3">
                <label for="endereco" class="form-label">Endereço:*</label>
                <input type="text"  style="width:50%" class="form-control" name='endereco' id="endereco">
            </div>
            <div class="mb-3">
                <label for="site" class="form-label">Site:*</label>
                <input type="text" style="width:50%" class="form-control" name='site'id="site">
            </div>
            <div class="mb-3">
                <label for="data_inicio" class="form-label">Data de Início:</label>
                <input type="date" style="width:11%" class="form-control" name='data_inicio' id="data_inicio">
                <label for="data_fim" class="form-label">Data Fim:</label>
                <input type="date" style="width:11%" class="form-control" name='data_fim' id="data_fim">
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-primary">Resetar</button>
        </form>
    </div>
    <script src='./js/script.js'></script>
@endsection