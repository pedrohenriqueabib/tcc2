@extends('site.layouts.layout')
@section('content')
<div class="container py-5">    
        <form action="{{route('salvarHorario')}}" method="post">
            @csrf
            <input type="hidden" value='{{$idAtividade}}' name='idAtividade'>
            <div class="mb-3">
                <label for="inicio" class="form-label">data de Início:*</label>
                <input type="date"  name="inicio" style="width:10%" class="form-control" id="inicio" >
            </div>
            <div class="mb-3">
                <label for="fim" class="form-label">Data Fim:*</label>
                <input type="date"  name="fim" style="width:10%" class="form-control" id="fim" >
            </div>
            <div class="mb-3">
                <label for="cargaHoraria" class="form-label">Carga Horária:*</label>
                <input type="text" name="cargaHoraria" style="width:10%" class="form-control" id="cargaHoraria" >
            </div>      
            <div class="mb-3">
                <label for="nome" class="form-label">Nome do Local:*</label>
                <input type="text" name="nome" style="width:10%" class="form-control" id="nome" >
            </div>           
            <div class="mb-3">
                <label for="pavimento" class="form-label">Pavimento:*</label>
                <input type="text" name="pavimento" style="width:10%" class="form-control" id="pavimento" >
            </div>           
            <div class="mb-3">
                <label for="bloco" class="form-label">Bloco:*</label>
                <input type="text" name="bloco" style="width:10%" class="form-control" id="bloco" >
            </div>           

            <button type="submit" class="btn btn-primary">Salvar</button>
            <button type="reset" class="btn btn-primary">Resetar</button>
        </form>
</div>
@endsection