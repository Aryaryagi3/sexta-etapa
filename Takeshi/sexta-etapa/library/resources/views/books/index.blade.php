@extends('layouts.main')

@section('title', 'Livros Disponíveis')

@section('content')
        <h1>Livros da Biblioteca</h1>
        <br>
        <div class="table-responsive">
            <table class="table table-striped">
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
                                        <a href="/book/{{$book->id}}">
                                            <img style="width: 110%" src="/img/covers/{{$book->cover}}" alt="Book cover">
                                        </a>
                                    </td>
                                    <td style="width: 28%">{{$book->title}}</td>
                                    <td style="width: 20%">{{$book->author}}</td>
                                    <td style="width: 20%">{{$book->brought_by}}</td>
                                    <td style="width: 20%">
                                        @if ($book->available == 0)
                                        {{$book->available}}
                                        Não Disponível
                                        @else
                                            <form method="POST" action="/book/{{$book->id}}">
                                                {{ csrf_field()}}
                                                <button class="btn btn-primary btn-success" type="submit">Pegar emprestado</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            </div>
                    @endforeach
                <tbody>
            </table>
        </div>
        {{ $books->links()}}
    @endsection