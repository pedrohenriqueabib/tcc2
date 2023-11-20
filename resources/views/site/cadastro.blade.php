@extends('site.layouts.layout')
@section('content')
    <div class="container py-5">
        <form action="{{route('controleCadastro')}}" method="POST">
            @csrf
            <div class="mb-3">
                <p>Aviso: Todos os campos são obrigatórios!</p>
            </div>
            <div class="mb-3">
                <label for="nome" class="form-label">Nome Completo:</label>
                <input type="text"  style="width:50%" class="form-control" id="nome" name="nome" >
            </div>
            <div class="mb-3">
                <label for="telefone" class="form-label">Telefone:</label>
                <input type="text"  style="width:50%" class="form-control" id="telefone" name="telefone" >
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email"  style="width:50%" class="form-control" name="email" id="email">
            </div>            
            <div class="mb-3">
                <label for="cargo" class="form-label">Cargo:</label>
                <input type="text"  style="width:50%" class="form-control" id="cargo" name="cargo">
            </div>       
            <div class="mb-3">
                <label for="matricula" class="form-label">Matrícula:</label>
                <input type="text" style="width:50%" class="form-control" id="matricula" name="matricula">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" style="width:50%" class="form-control" name="password" id="password">
            </div>
            <button type="submit" class="btn btn-primary" id="submit">Submit</button>
            <button type="reset" class="btn btn-primary">Resetar</button>
        </form>
    </div>
@endsection