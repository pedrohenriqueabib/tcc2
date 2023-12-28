@extends('site.layouts.layout')
@section('content')
    <div class="container py-5">
        <table class="table table-bordered table-striped mb-none dataTable no-footer" id="datatable-default" role="grid" aria-describedby="datatable-default_info">
            <thead>
                <tr>
                    <th class="sorting" tabindex="0" aria-controls="datatable-default" rowspan="1" colspan="1" style="width: 206.328px;">Nome</th>
                    <th class="sorting" tabindex="0" aria-controls="datatable-default" rowspan="1" colspan="1" style="width: 206.328px;">Descrição</th>
                    <th class="sorting" tabindex="0" aria-controls="datatable-default" rowspan="1" colspan="1" style="width: 206.328px;">Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach($colaborador_atividade as $valor)
                <tr>
                    <td>
                        <form action="{{route('showColaboradorAtividade')}}" method='GET'>
                            @csrf
                            <input type="hidden" name='atividade_id' value='{{$valor->atividade->id}}'>
                            <input type="hidden" name='colaborador_id' value='{{$valor->colaborador->id}}'>
                            <input type="submit" class='btn btn-link' value="{{$valor->atividade->nome}}">
                        </form>
                    </td>
                    <td>{{$valor->atividade->descricao}}</td>
                    <td>
                        <form action="" method='post'>
                            <input type="submit" class='btn btn-link' value="Cancelar Colaboração">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection