@extends('site.layouts.layout')
@section('content')
<div class="container py-5">
    <div>
        <a href='{{route("colaboradorAtividade")}}'>Voltar</a>
    </div>
    <br>
    <div class='atividade'>
        <p><strong>Atividade: </strong>{{$atividade->nome}}</p>
        <div>
            <p><strong>Descrição:</strong></p>
            <p>{{$atividade->descricao}}</p>
        </div>
        <div>
            <p><strong>Area: </strong>{{$atividade->area}}</p>
            <p><strong>Subarea: </strong>{{$atividade->subarea}}</p>
            <p><strong>Carga Horária: </strong>{{$atividade->carga_horaria}}hrs</p>
        </div>
    </div>
</div>
@endsection