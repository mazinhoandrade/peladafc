@extends('template.site')

@section('titulo' , 'Amigos da Bola')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@section('content')

<?php 
//dd($atletas[0]['gols']);
?>

<div class="container-fluid desk">
    <h1>Aniversariante(s) do Mes</h1>
    <div class="row justify-content-center align-items-start">
        
        @foreach ($atletas as $atleta)
            @if ( date('m', strtotime($atleta->data)) === date('m')  )
            <?php $entrou = true ?>
        <div class="col">
            <div class="campoAniversario row justify-content-start">
                <img class="img-responsive" src="{{asset('storage/media/imgat/'.$atleta->avatar)}}">
                <div class="titulo col-12">{{$atleta->nome}}</div>
                <div class="data col-12">{{date('d/m', strtotime($atleta->data))}}</div>
            </div>
        </div>
            @endif
        @endforeach
       
    </div>
</div>

<div class="container-fluid desk">
    <h1>Atletas Amigos da Bola</h1>
    <div class="row justify-content-center align-items-start">
        @foreach ($atletas as $atleta)
        <div class="col-6">
            <div class="areaatletas row justify-content-start">
                <div class="col-6">
                    <img class="img-responsive" src="{{asset('storage/media/imgat/'.$atleta->avatar)}}">
                </div>
                <div class="row col-6">
                    <div class="titulo col-12">{{$atleta->nome}}</div>
                    <div class="infoa col-12">
                        <b>Posição: </b>{{$atleta->posi}}<br />
                        <b>Aniversario: </b>{{date('d/m', strtotime($atleta->data))}}<br />
                        <b>Gols: </b>{{$atleta->gols}}<br />
                        <b>Assistecias: </b>{{$atleta->assis}}<br />
                        <b>Falhas: </b>{{$atleta->falhas}}<br />
                        <b>Capas: </b>{{$atleta->capa}} vezes<br />
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection