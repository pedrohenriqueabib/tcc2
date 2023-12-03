@extends('site.layouts.layout')
@section('content')
<main>
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Um evento pode ser uma experiência para toda a vida!</h1>
                <p class="lead text-body-secondary">
                    Seja bem vindo! Esperamos que você encontre um evento de seu interesse!
                </p>
            </div>
        </div>
    </section>

    @if($evento)
    <div class="album py-5 bg-body-tertiary">
        <div class="container">
        <h6>{{$evento->nome}}</h6>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <div class="col">
                <div class="card shadow-sm">
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="#55595c"/>
                        <text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                    </svg>
                    <div class="card-body">
                        <p class="card-text" id='descricao de evento'>{{$evento->descricao}}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-secondary">Visualizar</button>
                                <!-- <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button> -->
                            </div>
                            <!-- <small class="text-body-secondary">9 mins</small> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="album py-5 bg-body-tertiary">
        <div class="container">
        <h6>Teste</h6>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <div class="col">
                <div class="card shadow-sm">
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="#55595c"/>
                        <text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                    </svg>
                    <div class="card-body">
                        <p class="card-text" id='descricao de evento'>Descrição de um evento</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-secondary">Visualizar</button>
                                <!-- <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button> -->
                            </div>
                            <!-- <small class="text-body-secondary">9 mins</small> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</main>
@endsection