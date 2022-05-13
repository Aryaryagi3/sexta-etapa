@extends('layouts.main')

@section('title', 'Seus Livros')

@section('content')
        <div>
            <h1>Livros pegos emprestado por {{$user}}</h1>
            <br>
            <div class="table-responsive">
                @if($borrow->isEmpty())
                <h5>Você ainda não pegou nenhum livro emprestado da biblioteca</h5>
                @else
                <table class="table">
                    <thead>
                        <tr>
                            <th><h5>Capa</h5></th>
                            <th><h5>Título</h5></th>
                            <th><h5>Proprietário</h5></th>
                            <th><h5>Data de empréstimo</h5></th>
                            <th><h5>Empréstimo</h5></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($borrow as $borrowed)
                                <div>
                                    <tr style="height: 10rem">
                                        <td style="width: 12%">
                                            <img style="width: 110%" src="/img/covers/{{$borrowed->book->cover}}" alt="Book cover">
                                        </td>
                                        <td style="width: 28%">{{$borrowed->book->title}}</td>
                                        <td style="width: 20%">{{$borrowed->book->user->name}}</td>
                                        <td style="width: 20%">{{$borrowed->borrow_date}}</td>
                                        <td style="width: 20%">
                                            <form method="POST" action="/borrow/{{$borrowed->id}}">
                                                {{ method_field('PATCH') }}
                                                {{ csrf_field()}}
                                                <div>
                                                    <button class="btn btn-warning" type="submit">Devolver Livro</button>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                </div>
                        @endforeach
                    <tbody>
                </table>
                @endif
            </div>
            {{ $borrow->links()}}
        </div>
        <br>
        <div>
            <h1>Livros cadastrados por {{$user}}</h1>
            <br>
            <div class="table-responsive">
                @if($books->isEmpty())
                <h5>Você ainda não cadastrou nenhum livro na biblioteca</h5>
                @else
                <table class="table">
                    <thead>
                        <tr>
                            <th><h5>Capa</h5></th>
                            <th><h5>Título</h5></th>
                            <th><h5>Autor</h5></th>
                            <th><h5>Proprietário</h5></th>
                            <th><h5>Editar</h5></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($books as $book)
                                <div>
                                    <tr style="height: 10rem">
                                        <td style="width: 12%">
                                            <img style="width: 110%" src="/img/covers/{{$book->cover}}" alt="Book cover">
                                        </td>
                                        <td style="width: 28%">{{$book->title}}</td>
                                        <td style="width: 20%">{{$book->author}}</td>
                                        <td style="width: 20%">{{$book->user->name}}</td>
                                        <td style="width: 20%">
                                            <a href="/books/{{$book->id}}/edit"><button type="button" class="btn btn-secondary">Editar</button></a>
                                        </td>
                                    </tr>
                                </div>
                        @endforeach
                    <tbody>
                </table>
                @endif
            </div>
            {{ $books->links()}}
        </div>
        <br>
    @endsection