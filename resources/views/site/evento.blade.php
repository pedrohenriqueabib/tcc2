@extends('site.layouts.layout')
@section('content')

    <div class="container mt-5">
        <ul class="nav nav-tabs" id="myTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="tab1" data-bs-toggle="tab" href="#content1" role="tab" aria-controls="content1" aria-selected="true">Evento</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="tab2" data-bs-toggle="tab" href="#content2" role="tab" aria-controls="content2" aria-selected="false">Comitê</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="tab3" data-bs-toggle="tab" href="#content3" role="tab" aria-controls="content3" aria-selected="false">Atividade</a>
            </li>
        </ul>
    </div>

    <div class="tab-content">
        <div class="tab-pane fade show active" id="content1" role="tabpanel" aria-labelledby="tab1">
                
            @if(!session()->has('token'))
            <script>
                window.location.href = '/login';
            </script>
            @endif
            <div class="container py-5">
                <form action="{{route('editarEvento')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="organizador" class="form-label">Organizador:</label>
                        <input type="text" value='{{session("nomeUsuario")}}' style="width:50%" class="form-control" id="organizador" disabled>
                        <input type="hidden" value='{{session("nomeUsuario")}}' style="width:50%" class="form-control" name="organizador" >
                    </div>
                    <div>
                        <input type="hidden" name="evento_id" value='{{$evento->id}}'>
                    </div>
                    <div class="mb-3">
                        <label for="organizacao" class="form-label">Organização:</label>
                        <input type="text" value='{{$organizacao->nome}}' style="width:50%" class="form-control" name="organizacao" id="organizacao" disabled>
                        <input type="hidden" value='{{$organizacao->nome}}' style="width:50%" class="form-control" name="organizacao" >
                    </div>
                    <div class="mb-3">
                        <label for="nomeEvento" class="form-label">Nome do Evento:*</label>
                        <input type="text" value='{{$evento->nome}}' style="width:50%" class="form-control desativado" name="nomeEvento" id="nomeEvento"  disabled>
                    </div>
                    <div class="mb-3">
                        <label for="descricao" class="form-label">Descriçao:*</label>
                        <div>
                            <textarea name="descricao" class='desativado' id="descricao" cols="80" rows="" disabled>{{"$evento->descricao"}}</textarea>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="endereco" class="form-label">Endereço:*</label>
                        <input type="text"  style="width:50%" class="form-control desativado" value='{{$evento->endereco}}' name="endereco" id="endereco" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="edicao" class="form-label">Ediçao:*</label>
                        <input type="text"  style="width:50%" class="form-control desativado" value='{{$evento->edicao}}' name="edicao" id="edicao" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="site" class="form-label">Site:*</label>
                        <input type="text"  style="width:50%" class="form-control desativado" value='{{$evento->site}}' name="site" id="site" disabled>
                    </div>
                    
                    <div class="mb-3">
                        <label for="dataInicio" class="form-label">Data de Início:</label>
                        <input type="date" style="width:11%" class="form-control desativado" value='{{$evento->data_inicio}}' name="dataInicio" id="dataInicio" disabled>
                        <label for="dataFim" class="form-label">Data Término:</label>
                        <input type="date" style="width:11%" class="form-control desativado" value='{{$evento->data_fim}}' name="dataFim" id="dataFim" disabled>
                    </div>

                    <button class="btn btn-primary" id='editar'>Editar</button>
                    <button type="submit" id='salvar' class="btn btn-primary" style='display:none'>Salvar</button>
                    <button type="reset" id='cancelar' class="btn btn-primary" style='display:none'>Cancelar</button>
                </form>
            </div>
        </div>
    
        <div>
            <div class="tab-pane fade" id="content2" role="tabpanel" aria-labelledby="tab2">
                <div class="container py-5">
                    <p><a href='{{route("formComite", ["id"=>$organizacao->id])}}'>Adicionar Comitê: +</a></p>
                    <table class="table table-bordered table-striped mb-none dataTable no-footer" id="datatable-default" role="grid" aria-describedby="datatable-default_info">
                        <thead>
                            <tr>
                                <th>
                                    Nome
                                </th>
                                <th>
                                    Descrição
                                </th>
                                <th>
                                    Ação
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($comite as $valor)
                            <tr>
                                <td>
                                    <a href="{{route('showComite', ['id'=>$valor->id])}}">{{$valor->nome}}</a>
                                </td>
                                <td>
                                    {{$valor->descricao}} 
                                </td>
                                <td>
                                    <form action="{{route('excluirComite')}}" method='POST'>
                                        @csrf
                                        <input type="hidden" name='evento_id' value='{{$evento->id}}'>
                                        <input type="hidden" name="comite_id" value="{{$valor->id}}">
                                        <input type="submit" value="Remover" class='btn btn-link'>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>  
            </div>
        </div>

    
        <div>
            <div class="tab-pane fade" id="content3" role="tabpanel" aria-labelledby="tab3">      
                <div class="container py-5">
                    
                    Atividades Relacionadas: <a href="{{route('criarAtividade', ['id'=>$evento->id])}}">+</a>
                    <table class="table table-bordered table-striped mb-none dataTable no-footer" id="datatable-default" role="grid" aria-describedby="datatable-default_info">
						<thead>
                            <tr>
                                <th class="sorting" tabindex="0" aria-controls="datatable-default" rowspan="1" colspan="1" aria-label="Nome: " style="width: 206.328px;">Nome</th>
                                <th class="sorting" tabindex="0" aria-controls="datatable-default" rowspan="1" colspan="1" aria-label="Descrição: " style="width: 206.328px;">Descrição</th>
                                <th class="sorting" tabindex="0" aria-controls="datatable-default" rowspan="1" colspan="1" aria-label="Área: " style="width: 206.328px;">Área</th>
                                <th class="sorting" tabindex="0" aria-controls="datatable-default" rowspan="1" colspan="1" aria-label="Subarea: " style="width: 206.328px;">Subarea</th>
                                <th class="sorting" tabindex="0" aria-controls="datatable-default" rowspan="1" colspan="1" aria-label="Palavras Chaves: " style="width: 206.328px;">Palavras Chaves</th>
                                <th class="sorting" tabindex="0" aria-controls="datatable-default" rowspan="1" colspan="1" aria-label="Palavras Chaves: " style="width: 206.328px;">Ação</th>
                            </tr>
                        </thead>
						<tbody id="tabela">                    
                            @foreach($atividade as $valor)
                                <tr>
                                    <td><a href='{{route("showAtividade", ["id"=>$valor->id])}}'>{{$valor->nome}}</a></td>
                                
                                    <td>{{$valor->descricao}}</td>
                                    <td>{{$valor->area}}</td>
                                    <td>{{$valor->subarea}}</td>
                                    <td>{{$valor->palavras_chaves}}</td>
                                    <td>
                                        <form action='{{route("removerAtividade")}}' method='POST'>
                                            @csrf
                                            <input type="hidden" name='evento_id' value='{{$evento->id}}'>
                                            <input type="hidden" name="atividade_id" value="{{$valor->id}}">
                                            <input type="submit" value="Remover" class='btn btn-link'>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                            
                                   
                </div>
            </div>
        </div>
    </div>
    
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
  <script src="../js/evento.js"></script>
@endsection