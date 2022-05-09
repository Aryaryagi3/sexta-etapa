@extends('layouts.main')

@section('title', 'Cadastrar Livro')

@section('content')
        <h1>Registrar Livro</h1>

        <form method="POST" action="/book">
            {{ csrf_field()}}

            <div class="form-group">
                <label for="title">Título do livro: </label>
                <input type="text" name="title" placeholder="Insira o título do livro a ser cadastrado"  class="form-control">
            </div>

            <div class="form-group">
                <label for="author">Autor do livro: </label>
                <input type="text" name="author" placeholder="Insira o autor do livro a ser cadastrado"  class="form-control">
            </div>

            <div class="form-group">
                <label for="past-owner-name">Pessoa que trouxe o livro: </label>
                <input type="text" name="past-owner-name" placeholder="Insira o nome da pessoa que trouxe o livro"  class="form-control">
            </div>
            <div>
                <button class="btn btn-primary" type="submit">Cadastrar livro</button>
            </div>
        </form>
@endsection