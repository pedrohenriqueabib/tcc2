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
                <label for="organizador" class="form-label">Organizador:</label>
                <input type="text" name='organizador' id="organizador" value='{{session("organizador")}}' style="width:50%" class="form-control" disabled>
            </div>
            <div class="mb-3">
                <label for="nomeComite" class="form-label">Nome do Comite:*</label>
                <input type="text" style="width:50%" class="form-control" id="nomeComite" name='nomeComite' >
            </div>
            <div class="mb-3">
                <label for="descricaoComite" class="form-label">Descrição do Comite:*</label>
                <input type="text" style="width:50%" class="form-control" id="descricaoComite" name='descricaoComite' >
            </div>            
            
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-primary">Resetar</button>
        </form>
    </div>
    <script src='./scriptjs/criarEvento.js'><script>
@endsection