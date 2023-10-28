@extends('site.layouts.layout')
@section('content')
@if(!session()->has('token'))
<script>
    window.location.href = '/login';
</script>
@endif
    <div class="container py-5">
        <form action="" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nomeEvento" class="form-label">Nome do Evento:*</label>
                <input type="text"  style="width:50%" class="form-control" id="nomeEvento" >
            </div>
            <div class="mb-3">
                <label for="descricao" class="form-label">Descricao:*</label>
                <div>
                    <textarea name="descricao" id="descricao" cols="80" rows=""></textarea>
                </div>
            </div>
            <div class="mb-3">
                <label for="avRua" class="form-label">Av/Rua:*</label>
                <input type="text"  style="width:50%" class="form-control" id="avRua">
            </div>
            <div class="mb-3">
                <label for="numero" class="form-label">Nº.:*</label>
                <input type="text"  style="width:50%" class="form-control" id="numero">
            </div>
            <div class="mb-3">
                <label for="bairro" class="form-label">Bairro:*</label>
                <input type="text"  style="width:50%" class="form-control" id="bairro">
            </div>
            <div class="mb-3">
                <label for="cidade" class="form-label">Cidade:*</label>
                <input type="text"  style="width:50%" class="form-control" id="cidade">
            </div>
            <div class="mb-3">
                <label for="estado" class="form-label">Estado:*</label>
                <input type="text"  style="width:50%" class="form-control" id="estado">
            </div>
            <div class="mb-3">
                <label for="complemento" class="form-label">Complemento:</label>
                <input type="text"  style="width:50%" class="form-control" id="complemento">
            </div>
            <div class="mb-3">
                <label for="dataInicio" class="form-label">Data de Início:</label>
                <input type="date" style="width:11%" class="form-control" id="dataInicio">
                <label for="dataTérmino" class="form-label">Data de Término:</label>
                <input type="date" style="width:11%" class="form-control" id="dataTérmino">
            </div>
            <div class="mb-3">
                <label for="horaInicio" class="form-label">Início:</label>
                <input type="time" style="width:10%" class="form-control" id="horaInicio">
                <label for="horaTérmino" class="form-label">Término:</label>
                <input type="time" style="width:10%" class="form-control" id="horaTermino">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-primary">Resetar</button>
        </form>
    </div>
    <script src='./scriptjs/criarEvento.js'><script>
@endsection