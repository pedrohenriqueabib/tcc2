@extends('site.layouts.layout')
@section('content')
<div class='container py-5'>
    <!--Exibirá as inscrições para participar do evento-->
    <p><strong>Inscrição para assitir:</strong></p>
    @for($i=0; $i < count($evento); $i++)
        <p>{{$evento[$i]->nome}}</p>
    @endfor
    <p><strong>Inscrição para colaborar:</strong></p>
</div>
@endsection