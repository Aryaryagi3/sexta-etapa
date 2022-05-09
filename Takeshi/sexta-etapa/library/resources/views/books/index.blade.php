@extends('layouts.main')

@section('title', 'Livros Disponíveis')

@section('content')
        <h1>Livros disponíveis</h1>
        <br>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th><h5></h5></th>
                        <th><h5>Título</h5></th>
                        <th><h5>Autor</h5></th>
                        <th><h5>Trazido por</h5></th>
                        <th><h5>Disponível desde</h5></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($books as $book)
                        <tr>
                            @auth
                            <td><a href="/book/{{$book->id}}"><h5>Editar</h5></a></td>
                            @endauth
                            @guest
                            <td><h5>-</h5></td>
                            @endguest
                            <td>{{$book->title}}</td>
                            <td>{{$book->author}}</td>
                            <td>{{$book->past_owner_name}}</td>
                            <td>{{$book->created_at}}</td>
                        </tr>
                    @endforeach
                <tbody>
            </table>
        </div>
        {{ $books->links()}}
    @endsection