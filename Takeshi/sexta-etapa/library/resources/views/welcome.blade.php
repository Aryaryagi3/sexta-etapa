@extends('layouts.main')

@section('title', "Biblioteca da Let's")

@section('content')
<div class="container col-xxl-8 px-4 py-5">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
      <div class="col-10 col-sm-8 col-lg-6">
        <img src="/img/biblioteca.png" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
      </div>
      <div class="col-lg-6">
        <h1 class="display-5 fw-bold lh-1 mb-3">Biblioteca da Let's</h1>
        <p class="lead">Aqui nesta vasta biblioteca você encontrará uma grande variedade de livros para pegar emprestado, totalmente de graça!</p>
        <p class="lead">Basta criar sua conta e explorar os arredores da biblioteca.</p>
        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
            <a href="/register"><button type="button" class="btn btn-primary btn-lg px-4 gap-3 mr-1">Criar conta</button></a>
            <a href="/login"><button type="button" class="btn btn-secondary btn-lg px-4 gap-3">Entrar</button></a>
        </div>
      </div>
    </div>
  </div>
@endsection