@extends('site.layouts.layout')
@section('content')
<div class="container py-5">
    <p>Quer colaborar? Escolha a atividade</p>
    @foreach($atividade_evento as $dado)
        <form action='{{route("addParticipanteColaborador")}}' method="post">
            @csrf
            <input type="hidden" name=evento_id value='{{$evento_id}}'>
            <input type="hidden" name=atividade_id value='{{$dado->id}}'>
            <input type="hidden" name='participante_id' value='{{$participante_id}}'>
            <input class='btn btn-link' type="submit" value="{{$dado->nome}}">
        </form>
    @endforeach
</div>
@endsection