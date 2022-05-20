@extends('layouts.main')

@section('title', 'Livros')

@section('content')
        <h1>Livros da Biblioteca</h1>
        <br>
        <div class="table-responsive">
            @if($books->isEmpty())
            <h5>A biblioteca está vazia</h5>

            @else
            <table class="table">
                <thead>
                    <tr>
                        <th><h5>Capa</h5></th>
                        <th><h5>Título</h5></th>
                        <th><h5>Autor</h5></th>
                        <th><h5>Proprietário</h5></th>
                        <th><h5>Empréstimo</h5></th>
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
                                        @if ($book->available == 0)
                                        Não Disponível
                                        @else
                                            <form method="POST" action="/borrow">
                                                {{ csrf_field()}}
                                                <input type="hidden" name="book_id" value="{{$book->id}}">
                                                <button class="btn btn-primary btn-success" type="submit">Pegar emprestado</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            </div>
                    @endforeach
                <tbody>
            </table>
            @endif
        </div>
        {{ $books->links()}}
    @endsection