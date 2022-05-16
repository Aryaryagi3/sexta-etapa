@extends('layouts.main')

@section('title', 'Cadastrar Livro')

@section('content')
        <h1>Cadastrar Livro</h1>
        <br>
        <form method="POST" action="/books" id="form" onsubmit="return validate()" class="justify-content-center w-50" enctype="multipart/form-data">
            {{ csrf_field()}}

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" name="title" placeholder="Insira o título do livro a ser cadastrado">
                <label for="floatingInput">Título do livro</label>
                <p class="text-secondary"><small>Formato: exemplo exemplo exemplo</small></p>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" name="author" placeholder="Insira o autor do livro a ser cadastrado">
                <label for="floatingInput">Autor do livro</label>
                <p class="text-secondary"><small>Formato: exemplo exemplo</small></p>
            </div>

            <div class="form-group">
                <label for="cover">Capa do livro: </label>
                <input type="file" name="cover" class="form-control">
            </div>
            <br>
            <div>
                <button class="btn btn-success" type="submit">Cadastrar livro</button>
            </div>
        </form>
        <br>

@endsection