@extends('site.layouts.layout')
@section('content')
<div class="container py-5">
    <p><strong>Evento pertencente:</strong> <a href="{{route('showEvent')}}">{{session('nomeEvento')}}</a></p>
    <p><strong>Comite pertencente:</strong> {{$comite->nome}}</p>
    <table class="table table-bordered table-striped mb-none dataTable no-footer" id="datatable-default" role="grid" aria-describedby="datatable-default_info">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Cargo</th>
                <th>Matrícula</th>
            </tr>
        </thead>
        <tbody>
            @foreach($organizador as $valor)
            <tr>
                <td>{{$valor[0]->nome}}</td>
                <td>{{$valor[0]->email}}</td>
                <td>{{$valor[0]->cargo}}</td>
                <td>{{$valor[0]->matricula}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>  
</div>
@endsection