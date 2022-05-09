<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="d-flex flex-column min-vh-100">
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark -flex justify-content-between">
                <a class="navbar-brand" href='/'>Biblioteca da Let's</a>
                <ul class="navbar-nav">
                    @guest
                    <li class="nav-item"><a class="nav-link" href="/login">Entrar</a></li>
                    <li class="nav-item"><a class="nav-link" href="/register">Criar Conta</a></li>
                    @endguest
                    @auth
                    <li class="nav-item"><a class="nav-link" href="/book">Cadastrar Livro</a></li>
                    <li>
                        <form action="/logout" method="POST">
                            @csrf
                            <a href="/logout"
                            class="nav-link"
                            onclick="event.preventDefault();
                                this.closest('form').submit();">
                                Sair
                            </a>
                        </form>
                    </li>
                    @endauth
                </ul>
            </nav>
        </header>
        <main  class="container">
            <br>
            @yield('content')
        </main>
        <footer class="navbar navbar-expand-lg navbar-dark bg-dark mt-auto">
            <a class="navbar-brand" href='/'>Biblioteca da Let's</a>
        </footer>
    </body>
</html>
