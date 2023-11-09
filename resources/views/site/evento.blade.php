@extends('site.layouts.layout')
@section('content')
<div class="container mt-5">
    <ul class="nav nav-tabs" id="myTabs" role="tablist">
      <li class="nav-item" role="presentation">
        <a class="nav-link active" id="tab1" data-bs-toggle="tab" href="#content1" role="tab" aria-controls="content1" aria-selected="true">Evento</a>
      </li>
      <li class="nav-item" role="presentation">
        <a class="nav-link" id="tab2" data-bs-toggle="tab" href="#content2" role="tab" aria-controls="content2" aria-selected="false">Aba 2</a>
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
                        <input type="text" value='{{session("nome")}}' style="width:50%" class="form-control" name="organizador" id="organizador" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="nomeEvento" class="form-label">Nome do Evento:*</label>
                        <input type="text" value='{{session("nomeEvento")}}' style="width:50%" class="form-control" id="nomeEvento" >
                    </div>
                    <div class="mb-3">
                        <label for="descricao" class="form-label">Descricao:*</label>
                        <div>
                            <textarea name="descricao" id="descricao" cols="80" rows="">{{session("descricao")}}</textarea>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="avRua" class="form-label">Av/Rua:*</label>
                        <input type="text"  style="width:50%" class="form-control" value='{{session("avRua")}}'id="avRua">
                    </div>
                    <div class="mb-3">
                        <label for="numero" class="form-label">Nº.:*</label>
                        <input type="text"  style="width:50%" class="form-control" value='{{session("numero")}}' id="numero">
                    </div>
                    <div class="mb-3">
                        <label for="bairro" class="form-label">Bairro:*</label>
                        <input type="text"  style="width:50%" class="form-control" value='{{session("bairro")}}'id="bairro">
                    </div>
                    <div class="mb-3">
                        <label for="cidade" class="form-label">Cidade:*</label>
                        <input type="text"  style="width:50%" class="form-control" value='{{session("cidade")}}' id="cidade">
                    </div>
                    <div class="mb-3">
                        <label for="estado" class="form-label">Estado:*</label>
                        <input type="text"  style="width:50%" class="form-control" value='{{session("estado")}}'id="estado">
                    </div>
                    <div class="mb-3">
                        <label for="complemento" class="form-label">Complemento:</label>
                        <input type="text"  style="width:50%" class="form-control" value='{{session("complemento")}}' id="complemento">
                    </div>
                    <div class="mb-3">
                        <label for="dataInicio" class="form-label">Data de Início:</label>
                        <input type="date" style="width:11%" class="form-control" value='{{session("dataInicio")}}' id="dataInicio">
                        <label for="dataTérmino" class="form-label">Data Término:</label>
                        <input type="date" style="width:11%" class="form-control" value='{{session("dataFim")}}' id="dataFim">
                    </div>
                    <div class="mb-3">
                        <label for="horaInicio" class="form-label">Início:</label>
                        <input type="time" style="width:10%" class="form-control" value='{{session("horaInicio")}}' id="horaInicio">
                        <label for="horaTérmino" class="form-label">Término:</label>
                        <input type="time" style="width:10%" class="form-control" value='{{session("horaTermino")}}' id="horaTermino">
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
                
            </div>
        </div>
      
        <div class="tab-pane fade" id="content3" role="tabpanel" aria-labelledby="tab3">
            <p>Conteúdo da aba 3.</p>
        </div>
    </div>

  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
@endsection