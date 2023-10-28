@extends('site.layouts.layout')
@section('content')
    <div class="container py-5">
        <form action="" method="POST">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome Completo:</label>
                <input type="text"  style="width:50%" class="form-control" id="nome" >
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email"  style="width:50%" class="form-control" id="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" style="width:50%" class="form-control" id="password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-primary">Resetar</button>
        </form>
    </div>
@endsection