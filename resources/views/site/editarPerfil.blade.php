@extends('site.layouts.layout')
@section('content')
    <div class="container py-5">
        <!-- <div>
            <input type="hidden" id='tipo_perfil' value='{{session("tipoPerfil")}}'>
        </div> -->
        <div class="formulario">
            @if(session('tipoPerfil') == 'Organizador')
                <div id="formOrganizador">
                    <form action="{{route('editarUsuario')}}" method="post">
                        @csrf            
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome Completo do Organizador:</label>
                            <input type="text" value='{{$dados->nome}}' style="width:50%" class="form-control" id="nome" name="nome" >
                        </div>
                        <div class="mb-3">
                            <label for="telefone" class="form-label">Telefone:</label>
                            <input type="text" value='{{$dados->telefone}}' maxlength='15'  style="width:50%" class="form-control" id="telefone" name="telefone" >
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" value='{{$dados->email}}' style="width:50%" class="form-control" name="email" id="email">
                        </div>            
                        <div class="mb-3">
                            <label for="cargo" class="form-label">Cargo:</label>
                            <input type="text" value='$dados->cargo' maxlength='2' style="width:50%" class="form-control" id="cargo" name="cargo">
                        </div>       
                        <div class="mb-3">
                            <label for="matricula" class="form-label">Matrícula:</label>
                            <input type="text" value='{{$dados->matricula}}' maxlength='5' style="width:50%" class="form-control" id="matricula" name="matricula">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" style="width:50%" class="form-control" name="password" id="password">
                        </div>
                        <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                        <button type="reset" class="btn btn-primary">Resetar</button>
                    </form>
                </div>            
            <!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
            @elseif(session('tipoPerfil') == 'Responsavel')
                <div id="formResponsavel">
                    <form action="{{route('editarUsuario')}}" method="post">
                        @csrf            
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome Completo do Responsável:</label>
                            <input type="text" value='{{$dados->nome}}' style="width:50%" class="form-control" id="nome" name="nome" >
                        </div>
                        <div class="mb-3">
                            <label for="telefone" class="form-label">Telefone:</label>
                            <input type="text" value='{{$dados->telefone}}' maxlength='15'  style="width:50%" class="form-control" id="telefone" name="telefone" >
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" value='{{$dados->email}}' style="width:50%" class="form-control" name="email" id="email">
                        </div>            
                        <div class="mb-3">
                            <label for="cargo" class="form-label">Cargo:</label>
                            <input type="text" value='{{$dados->cargo}}' maxlength='2' style="width:50%" class="form-control" id="cargo" name="cargo">
                        </div>       
                        <div class="mb-3">
                            <label for="matricula" class="form-label">Matrícula:</label>
                            <input type="text" value='{{$dados->matricula}}' maxlength='5' style="width:50%" class="form-control" id="matricula" name="matricula">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" style="width:50%" class="form-control" name="password" id="password">
                        </div>
                        <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                        <button type="reset" class="btn btn-primary">Resetar</button>
                    </form>
                </div>
            <!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
            @elseif(session('tipoPerfil') == 'Participante')
            <div id="formParticipante">
                <form action="{{route('editarUsuario')}}" method="post">
                    @csrf            
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome Completo do Participante:</label>
                        <input type="text"  value='{{$dados->nome}}' style="width:50%" class="form-control" id="nome" name="nome" >
                    </div>
                    <div class="mb-3">
                        <label for="telefone" class="form-label">Telefone:</label>
                        <input type="text" value='{{$dados->telefone}}' maxlength='15'  style="width:50%" class="form-control" id="telefone" name="telefone" >
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" value='{{$dados->email}}' style="width:50%" class="form-control" name="email" id="email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" style="width:50%" class="form-control" name="password" id="password">
                    </div>
                    <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                    <button type="reset" class="btn btn-primary">Resetar</button>
                </form>
            </div>
            <!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
            @elseif(session('tipoPerfil') == 'Colaborador')
            <div id="formColaborador">
                <form action="{{route('editarUsuario')}}" method="post">
                    @csrf            
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome Completo do Colaborador:</label>
                        <input type="text" value='{{$dados->nome}}' style="width:50%" class="form-control" id="nome" name="nome" >
                    </div>
                    <div class="mb-3">
                        <label for="telefone" class="form-label">Telefone:</label>
                        <input type="text" value='{{$dados->telefone}}' maxlength='15'  style="width:50%" class="form-control" id="telefone" name="telefone" >
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" value='{{$dados->email}}' style="width:50%" class="form-control" name="email" id="email">
                    </div>            
                    <div class="mb-3">
                        <label for="descricao" class="form-label">Descrição:</label>
                        <input type="text" value='{{$dados->descricao}}' style="width:50%" class="form-control" id="descricao" name="descricao">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" style="width:50%" class="form-control" name="password" id="password">
                    </div>
                    <button type="submit" class="btn btn-primary" id="submit">Editar</button>
                    <button type="reset" class="btn btn-primary">Resetar</button>
                </form>
            </div>
            @endif
            <!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->        
        </div>
    <script src="../js/editarPerfil.js"></script>
    </div>
@endsection