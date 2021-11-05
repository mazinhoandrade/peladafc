<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>@yield('titulo')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://localhost/babav1/resources/views/template/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/babav1/resources/views/template/css/stylesite.css">
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

    

    <section>
        @yield('content')
    </section>

    <footer>
        Todos os Direitos Resevados - Amigos Da Bola - By:MazinhoAndrade
    </footer>
</body>
</html>