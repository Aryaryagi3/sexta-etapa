<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic&display=swap" rel="stylesheet">

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous">
        </script>

        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous">
        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous">
        </script>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
        crossorigin="anonymous">

        <link src="/css/custom.css" rel="stylesheet">

        <style>
            body {
                font-family: 'Nanum Gothic', sans-serif;
            }
        </style>
    </head>
    <body class="d-flex flex-column min-vh-100" style="background-color: #e5e5dc">
        <header>
            <nav class="p-2 navbar navbar-expand-lg justify-content-between"  style="background-color: #26495c">
                <div>
                    <a class="navbar-brand text-light" href="/" >Biblioteca da Let's</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                  <ul class="navbar-nav">
                    <li class="nav-item">
                      <a class="nav-link text-light" href="/books">Livros</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-light" href="/books/create">Cadastrar Livro</a>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Sua conta
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        @guest
                        <a class="dropdown-item" href="/register">Criar Conta</a>
                        <a class="dropdown-item" href="/login">Entrar</a>
                        @endguest
                        @auth
                        <a class="dropdown-item" href="/borrow">Seus livros</a>
                        <form action="/logout" method="POST" class="">
                            @csrf
                            <a href="/logout"
                            class="dropdown-item"
                            onclick="event.preventDefault();
                                this.closest('form').submit();">
                                Sair
                            </a>
                        </form>
                        @endauth
                      </div>
                    </li>
                  </ul>
                </div>
              </nav>
        </header>
        <main  class="container">
            <br>
            @yield('content')
        </main>
        <footer class="text-center text-lg-start text-muted mt-auto text-light" style="background-color: #26495c">
          <div class="text-center p-4 text-light">
            © 2022 Copyright:
            <a class="text-reset fw-bold text-decoration-none text-light" href="/">Biblioteca da Let's</a>
          </div>
        </footer>
    </body>
</html>
