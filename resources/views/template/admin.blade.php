<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>@yield('titulo')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://localhost/babav1/resources/views/template/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/babav1/resources/views/template/css/style.css">
</head>

<body>

    <header>
        <div class="container-fluid">
            <div class="row top justify-content-center">
                <div class="logo">
                    <h1>amigos da bola</h1>
                </div>
            </div>
        </div>
    </header>

    <div class="container-fluid desk">
        <div class="row justify-content-between info">
            <div class="col col-xl-4">
                <h2>seja bem vindo: <b>{{ Auth::user()->name }}</b></h2>
            </div>

            <div class="col-4">
                <h3><a href="/logout"><b>Sair</b></a></h3>
            </div>
        </div>
    </div>

    <div class="container-fluid desk">
        <div class="row justify-content-between ">
            <div class="col nav">
                <ul>
                    <a href="http://127.0.0.1:8000/admin">
                        <li>INICIO</li>
                    </a>
                    <a href="http://127.0.0.1:8000/admin/atleta">
                        <li>LISTA DE ATLETAS</li>
                    </a>
                    <a href="http://127.0.0.1:8000/admin/atleta/create">
                        <li>ADD NOVO ATLETA</li>
                    </a>
                    <a href="http://127.0.0.1:8000/admin/baba">
                        <li>LISTA BABAS</li>
                    </a>
                    <a href="http://127.0.0.1:8000/admin/baba/create">
                        <li>ADD NOVO BABA</li>
                    </a>
                </ul>
            </div>
        </div>
    </div>



    <section>
        @yield('content')
    </section>

    <footer>
        Todos os Direitos Resevados - Amigos Da Bola - By:MazinhoAndrade
    </footer>

</body>

</html>
