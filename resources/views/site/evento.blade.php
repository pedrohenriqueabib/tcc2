@extends('site.layouts.layout')
@section('content')
<div class="container mt-5">
    <ul class="nav nav-tabs" id="myTabs" role="tablist">
      <li class="nav-item" role="presentation">
        <a class="nav-link active" id="tab1" data-bs-toggle="tab" href="#content1" role="tab" aria-controls="content1" aria-selected="true">Evento</a>
      </li>
      <li class="nav-item" role="presentation">
        <a class="nav-link" id="tab2" data-bs-toggle="tab" href="#content2" role="tab" aria-controls="content2" aria-selected="false">Atividades</a>
      </li>
      <li class="nav-item" role="presentation">
        <a class="nav-link" id="tab3" data-bs-toggle="tab" href="#content3" role="tab" aria-controls="content3" aria-selected="false">Aba 3</a>
      </li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane fade show active" id="content1" role="tabpanel" aria-labelledby="tab1">
                
            @if(!session()->has('token'))
            <script>
                window.location.href = '/login';
            </script>
            @endif
            <div class="container py-5">
                <form action="" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="organizador" class="form-label">Organizador:</label>
                        <input type="text" value='{{session("organizador")}}' style="width:50%" class="form-control" name="organizador" id="organizador" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="nomeEvento" class="form-label">Nome do Evento:*</label>
                        <input type="text" value='{{$evento->nome}}' style="width:50%" class="form-control" id="nomeEvento" >
                    </div>
                    <div class="mb-3">
                        <label for="descricao" class="form-label">Descriçao:*</label>
                        <div>
                            <textarea name="descricao" id="descricao" cols="80" rows="">{{"$evento->descricao"}}</textarea>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="avRua" class="form-label">Endereço:*</label>
                        <input type="text"  style="width:50%" class="form-control" value='{{$evento->endereco}}'id="avRua">
                    </div>
                    <div class="mb-3">
                        <label for="edicao" class="form-label">Ediçao:*</label>
                        <input type="text"  style="width:50%" class="form-control" value='{{$evento->edicao}}' id="edicao">
                    </div>
                    <div class="mb-3">
                        <label for="site" class="form-label">Site:*</label>
                        <input type="text"  style="width:50%" class="form-control" value='{{$evento->site}}' id="site">
                    </div>
                    
                    <div class="mb-3">
                        <label for="dataInicio" class="form-label">Data de Início:</label>
                        <input type="date" style="width:11%" class="form-control" value='{{$evento->data_inicio}}' id="dataInicio">
                        <label for="dataTérmino" class="form-label">Data Término:</label>
                        <input type="date" style="width:11%" class="form-control" value='{{$evento->data_fim}}' id="dataFim">
                    </div>

                    <button type="submit" class="btn btn-primary">Editar</button>
                    <button type="reset" class="btn btn-primary">Resetar</button>
                </form>
            </div>
        </div>
    </div>
    
        <div class="tab-pane fade" id="content2" role="tabpanel" aria-labelledby="tab2">      
            <div class="container py-5">
            Atividades Relacionadas: <a href="{{route('site.criarAtividade')}}">+</a>

            <table class="table table-bordered table-striped mb-none dataTable no-footer" role="grid" aria-describedby="datatable-default_info">
					<thead>
						<tr role="row">
                            <th class="sorting" tabindex="0" aria-controls="datatable-default" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Nome: activate to sort column ascending" style="width: 225.938px;">Nome</th>
                            <!-- <th class="sorting" tabindex="0" aria-controls="datatable-default" rowspan="1" colspan="1" aria-label="Raça: activate to sort column ascending" style="width: 206.328px;">Raça</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-default" rowspan="1" colspan="1" aria-label="Cor: activate to sort column ascending" style="width: 172.578px;">Cor</th>
                            <th class="sorting" tabindex="0" aria-controls="datatable-default" rowspan="1" colspan="1" aria-label="Ação: activate to sort column ascending" style="width: 209.156px;">Ação</th> -->
                        </tr>
					</thead>
					<tbody id="tabela">				        
                            <!-- @foreach($evento->atividades as $valor)
                                <tr  class="tabble-row odd" role="row">
                                    <td class="sorting_1">{{ $valor->nome }}</td>
                                </tr>
                            @endforeach -->
                            
                    </tbody>
			</table>

                
            </div>
        </div>
      
        <div class="tab-pane fade" id="content3" role="tabpanel" aria-labelledby="tab3">
            <p>Conteúdo da aba 3.</p>
        </div>
    </div>

  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
@endsection