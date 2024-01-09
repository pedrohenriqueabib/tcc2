@extends('site.layouts.layout')
@section('content')
<div class="container py-5">
    <div>
        <a href="{{route('showPerfil')}}">Voltar</a>
    </div>
    <br>
    <div>
        Atividades:
        @foreach($responsavel_atividade as $valor)
            {{$valor->nome}}<br><hr>
        @endforeach
    </div>
</div>
@endsection