@extends('site.layouts.layout')
@section('content')
<div class='container py-5'>
    <p><a href='{{route("site.perfil")}}'>Retornar para perfil:</a></p>
    @if(isset($evento) && !empty($evento))
        @foreach($evento as $valor)
            <p>{{$valor->nome}} {{$valor->id}}</p>
            <p>Atividades:</p>
            <ul>
            @foreach($atividade as $dado)
                    @if($dado->evento_id == $valor->id)
                        <li><p>{{$dado->nome}}</p></li>
                    @endif
            @endforeach
            </ul>
            <hr></hr>
        @endforeach
    @endif
</div>
@endsection