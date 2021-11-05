@extends('template.admin')

@section('titulo' , 'Painel')

@section('content')



    <div class="container-fluid desk corcinza">
        <div class="row justify-content-center">

            <div class="col menu">
                <a href="admin/atleta">
                <img src="https://image.flaticon.com/icons/png/512/46/46637.png" alt="">
                <h1>Atleta</h1>
                </a>
            </div>
          
            <div class="col menu">
                <a href="admin/baba">
                <img src="https://cdn-icons-png.flaticon.com/512/53/53283.png" alt="">
                <h1>Baba</h1>
                </a>
            </div>

        </div>
    </div>

@endsection