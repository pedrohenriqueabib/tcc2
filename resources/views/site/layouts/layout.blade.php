<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css/style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <title>Teste TCC2</title>
    </head>
    <body>
        <header data-bs-theme="dark">
            <div class="navbar navbar-dark bg-dark shadow-sm">
                <div class="container">
                    <div class="home">
                        <a href="{{ route('site.home') }}" class="navbar-brand d-flex align-items-center">
                            Home
                        </a>
                    </div>
                    <div class="login">
                        <ul class="navbar-nav ml-auto mt-3 mt-sm-0 flex-row">
                        @if( session()->has('token'))
                            <li class="nav-item dropdown px-2 py-1 py-sm-0">
                                <a href="{{ route('site.perfil') }}" class="navbar-brand d-flex align-items-center">
                                    {{ session('nomeUsuario') }}
                                </a>
                            </li>
                            <li class="nav-item dropdown px-2 py-1 py-sm-0">
                                <a href="{{route('logout')}}" class="navbar-brand d-flex align-items-center">
                                    Logout
                                </a>
                            </li>
                        @else
                            <li class="nav-item dropdown px-2 py-1 py-sm-0">
                                <a href="{{ route('login') }}" class="navbar-brand d-flex align-items-center">
                                    Login                            
                                </a>
                            </li>
                        @endif
                        </ul>
                    </div>
                </div>
            </div>
        </header>

        @yield('content')    

        <footer class="text-body-secondary py-5">
            <div class="container">
                <p class="float-end mb-1">
                <a href="#">Back to top</a>
                </p>
                <p class="mb-1">Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
                <p class="mb-0">New to Bootstrap? <a href="/">Visit the homepage</a> or read our <a href="/docs/5.3/getting-started/introduction/">getting started guide</a>.</p>
            </div>
        </footer>
        <script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
        <script src=""></script>
    </body>
</html>