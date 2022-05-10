@extends('layouts.main')

@section('title', 'Editar livro')

@section('content')

        <h1>Editar Livro</h1>

        <form method="POST" action="/book/{{$book->id}}">
            {{ method_field('PATCH') }}
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
                <label for="brought-by">Pessoa que trouxe o livro: </label>
                <input type="text" name="brought-by" placeholder="Insira o nome da pessoa que trouxe o livro"  class="form-control">
            </div>

            <div>
                <button class="btn btn-primary" type="submit">Atualizar Livro</button>
            </div>
        </form>
        <br>
        <form method="POST" action="/book/{{$book->id}}">
            {{ method_field('DELETE') }}
            {{ csrf_field()}}
            <button class="btn btn-primary btn-danger" type="submit">Deletar livro</button>
        </form>
@endsection