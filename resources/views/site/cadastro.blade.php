@extends('site.layouts.layout2')
@section('content')
    
    <div class="div_formulario container py-5">
    <div class="mb-3">
        <p>Aviso: Todos os campos são obrigatórios!</p>
    </div>
    <div>
        <p>Eu sou:
        <select name="selector" id="selector">
            <option value="Selecionar" disabled selected>Selecionar</option>
            <option value="organizador">Organizador</option>
            <option value="responsavel">Responsável</option>
            <option value="participante">Participante</option>
            <option value="colaborador">Colaborador</option>
        </select>
        </p>
    </div>
    <div class="formulario">
        <div id="formOrganizador" style='display:none'>
            <form action="{{route('saveUser')}}" method="POST">
                @csrf            
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome Completo do Organizador:</label>
                    <input type="text"  style="width:50%" class="form-control" id="nome" name="nome" >
                    <input type="hidden" name="formTipo" value="formOrganizador">
                </div>
                <div class="mb-3">
                    <label for="telefone" class="form-label">Telefone:</label>
                    <input type="text" maxlength='15'  style="width:50%" class="form-control" id="telefone" name="telefone" >
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email"  style="width:50%" class="form-control" name="email" id="email">
                </div>            
                <div class="mb-3">
                    <label for="cargo" class="form-label">Cargo:</label>
                    <input type="text" maxlength='2' style="width:50%" class="form-control" id="cargo" name="cargo">
                </div>       
                <div class="mb-3">
                    <label for="matricula" class="form-label">Matrícula:</label>
                    <input type="text" maxlength='5' style="width:50%" class="form-control" id="matricula" name="matricula">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" style="width:50%" class="form-control" name="password" id="password">
                    <input type="checkbox" id="exibirSenha"> Exibir Senha
                </div>
                <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                <button type="reset" class="btn btn-primary">Resetar</button>
            </form>
        </div>
        <!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
        <div id="formResponsavel" style='display:none'>
            <form action="{{route('saveUser')}}" method="POST">
                @csrf            
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome Completo do Responsável:</label>
                    <input type="text"  style="width:50%" class="form-control" id="nome" name="nome" >
                    <input type="hidden" name="formTipo" value="formResponsavel">
                </div>
                <div class="mb-3">
                    <label for="telefone" class="form-label">Telefone:</label>
                    <input type="text" maxlength='15'  style="width:50%" class="form-control" id="telefone" name="telefone" >
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email"  style="width:50%" class="form-control" name="email" id="email">
                </div>            
                <div class="mb-3">
                    <label for="cargo" class="form-label">Cargo:</label>
                    <input type="text" maxlength='2' style="width:50%" class="form-control" id="cargo" name="cargo">
                </div>       
                <div class="mb-3">
                    <label for="matricula" class="form-label">Matrícula:</label>
                    <input type="text" maxlength='5' style="width:50%" class="form-control" id="matricula" name="matricula">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" style="width:50%" class="form-control" name="password" id="password">
                    <input type="checkbox" id="exibirSenha"> Exibir Senha
                </div>
                <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                <button type="reset" class="btn btn-primary">Resetar</button>
            </form>
        </div>
        <!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
        <div id="formParticipante" style='display:none'>
            <form action="{{route('saveUser')}}" method="POST">
                @csrf            
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome Completo do Participante:</label>
                    <input type="text"  style="width:50%" class="form-control" id="nome" name="nome" >
                    <input type="hidden" name="formTipo" value="formParticipante">
                </div>
                <div class="mb-3">
                    <label for="telefone" class="form-label">Telefone:</label>
                    <input type="text" maxlength='15'  style="width:50%" class="form-control" id="telefone" name="telefone" >
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email"  style="width:50%" class="form-control" name="email" id="email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" style="width:50%" class="form-control" name="password" id="password">
                    <input type="checkbox" id="exibirSenha"> Exibir Senha
                </div>
                <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                <button type="reset" class="btn btn-primary">Resetar</button>
            </form>
        </div>
        <!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
        <div id="formColaborador" style='display:none'>
            <form action="{{route('saveUser')}}" method="POST">
                @csrf            
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome Completo do Colaborador:</label>
                    <input type="text"  style="width:50%" class="form-control" id="nome" name="nome" >
                    <input type="hidden" name="formTipo" value="formColaborador">
                </div>
                <div class="mb-3">
                    <label for="telefone" class="form-label">Telefone:</label>
                    <input type="text" maxlength='15'  style="width:50%" class="form-control" id="telefone" name="telefone" >
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email"  style="width:50%" class="form-control" name="email" id="email">
                </div>            
                <div class="mb-3">
                    <label for="descricao" class="form-label">Descrição:</label>
                    <input type="text"  style="width:50%" class="form-control" id="descricao" name="descricao">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" style="width:50%" class="form-control" name="password" id="password">
                    <input type="checkbox" id="exibirSenha"> Exibir Senha
                </div>
                <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                <button type="reset" class="btn btn-primary">Resetar</button>
            </form>
        </div>
        <!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->        
    </div>
    <script src="./js/cadastro.js"></script>
@endsection