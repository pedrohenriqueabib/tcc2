@extends('site.layouts.layout2')
@section('content')
<body>
    <div class="container py-5">
        <h2 class="fs-6">
            Ainda não tem conta?
            <a class="text-decoration-none fs-6" href="{{route('site.cadastro')}}" ng-if="viewModel.evento.urlEvento == null">Clique aqui para criar uma</a>
        </h2>
        <form action="{{route('autenticar')}}" method="GET">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" name='email' style="width:50%" class="form-control" id="email" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <label for="password-login" class="label-text" style="margin-left:32%">
                    <a href="/evento/esquecipassword" class="text-decoration-none fs-6" ng-if="viewModel.evento.urlEvento == null">Esqueci minha password</a><!---->
                </label>
                <input type="password" name='password' style="width:50%" class="form-control" id="password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-primary">Resetar</button>        
        </form>
    </div>
    <script src="./js/login.js"></script>
</body>
@endsection