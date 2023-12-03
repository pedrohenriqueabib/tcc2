@extends('site.layouts.layout')
@section('content')
<div class="container py-5">
    <p><a href='{{route("criarHorario")}}'>Adicionar Horário:+</a></p>
    @foreach($atividade_horario as $valor)
        <!-- <form action="" method="post">
            @csrf
            <div class="mb-3">
                <label for="nomeLocal" class="form-label">Nome do Local:*</label>
                <input type="text" value='{{$valor->local->nome}}' name="nomeLocal" style="width:50%" class="form-control" id="nomeLocal" >
                <input type='hidden' value='{{$valor->local->id}}' name='idLocal' id='idLocal'>
            </div>
            <div class="mb-3">
                <label for="pavimento" class="form-label">Pavimento:*</label>
                <input type="text" value="{{$valor->local->pavimento}}" name="area" style="width:50%" class="form-control" id="pavimento" >
            </div>
            <div class="mb-3">
                <label for="area" class="form-label">Bloco:*</label>
                <input type="text" value="{{$valor->local->bloco}}" name="bloco" style="width:50%" class="form-control" id="bloco" >
            </div>
            <div class="mb-3">
                <label for="dia_semana" class="form-label">Dia da Semana:*</label>
                <input type="text" value='{{$diaSemana}}' name="dia_semana" style="width:5%" class="form-control" id="dia_semana" disabled>
            </div>
            <div class="mb-3">
                <label for="inicio" class="form-label">Início:*</label>
                <input type="date" value='{{$valor->horario->inicio}}' name="inicio" style="width:10%" class="form-control" id="inicio" >
            </div>
            <div class="mb-3">
                <label for="fim" class="form-label">Fim:*</label>
                <input type="date" value='{{$valor->horario->fim}}' name="fim" style="width:10%" class="form-control" id="fim" >
            </div>
            <div class="mb-3">
                <label for="cargaHoraria" class="form-label">Carga Horária:*</label>
                <input type="text" value='{{$valor->horario->carga_horaria}}' name="cargaHoraria" style="width:10%" class="form-control" id="cargaHoraria" >
            </div>           

            <button type="submit" class="btn btn-primary">Editar</button>
            <button type="reset" class="btn btn-primary">Resetar</button>
        </form> -->
    @endforeach
    </div>
@endsection