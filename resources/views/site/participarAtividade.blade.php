@extends('site.layouts.layout')
@section('content')
<div class="container py-5">
    <a href='{{route("showInscricao")}}'><p>Retonar para Inscrições</p></a>
    <div>

        @if(count($atividades) != count($inscrito))
            <table class="table table-bordered table-striped mb-none dataTable no-footer" id="datatable-default" role="grid" style="width: 75%;" aria-describedby="datatable-default_info">
                <thead>
                    <tr>
                        <th class="sorting" tabindex="0" aria-controls="datatable-default" rowspan="1" colspan="1" aria-label="Nome: " style="width: 206.328px;">Nome</th>
                        <th class="sorting" tabindex="0" aria-controls="datatable-default" rowspan="1" colspan="1" aria-label="Descrição: " style="width: 206.328px;">Descrição</th>
                        <th class="sorting" tabindex="0" aria-controls="datatable-default" rowspan="1" colspan="1" aria-label="Ação: " style="width: 206.328px;">Ação</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($atividades as $valor)
                    @if(!in_array($valor->id, $inscrito))
                    <tr>
                        <td><p>{{$valor->nome}}</p></td>
                        <td><p>{{$valor->descricao}}</p></td>
                        <td>
                            <form method="POST" action='{{route("inscreverEmAtividade")}}'>
                                @csrf
                                <input type='hidden' value='{{$valor->id}}' name='atividade_id'>
                                <input type='hidden' value='{{session("idUsuario")}}' name='participante_id'>
                                <input type="submit" value="Me Inscrever" class='btn btn-link'>
                            </form>
                        </td>
                    </tr>
                    @endif
                @endforeach                
                </tbody>
            </table>
        @else
            <p>Você não tem mais atividades para se inscrever.</p>
        @endif
       
    </div>
</div>
@endsection