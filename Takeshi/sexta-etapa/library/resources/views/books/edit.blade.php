@extends('layouts.main')

@section('title', 'Editar Livro')

@section('content')
        <h1>Editar Livro</h1>
        <br>
        <form method="POST" action="/books/{{$book->id}}" id="form" onsubmit="return validate()" class="justify-content-center w-50" enctype="multipart/form-data">
            {{ csrf_field()}}
            {{ method_field('PATCH') }}

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" name="title" placeholder="Insira o título do livro a ser cadastrado" value="{{$book->title}}">
                <label for="floatingInput">Título do livro</label>
                <p class="text-secondary"><small>Formato: exemplo exemplo exemplo</small></p>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" name="author" placeholder="Insira o autor do livro a ser cadastrado" value="{{$book->author}}">
                <label for="floatingInput">Autor do livro</label>
                <p class="text-secondary"><small>Formato: exemplo exemplo</small></p>
            </div>

            <div class="form-group">
                <label for="cover">Capa do livro: </label>
                <input type="file" name="cover" class="form-control">
            </div>
            <br>
            <div>
                <button class="btn btn-success" type="submit">Editar livro</button>
            </div>
        </form>
        <br>
        <form method="POST" onsubmit="return confirm('Deseja mesmo retirar o livro da biblioteca?')" action="/books/{{$book->id}}">
            {{ method_field('DELETE') }}
            {{ csrf_field()}}
            <button class="btn btn-primary btn-danger" type="submit">Apagar livro</button>
        </form>
        <br>
        <script>
            function validate() {
                let elements = document.getElementById("form").elements;
                let keyWords = ['', 'título', 'autor', 'capa do livro']

                for (let i = 0; i < 4; i++) {
                    console.log(elements[i]);
                    if (elements[i].value == "") {
                    alert("Por favor, preencha o campo " + keyWords[i]);
                    return false;
                    }
                }
                alert("Livro editado com sucesso.");
            };
        </script>
@endsection