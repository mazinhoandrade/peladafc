@extends('template.site')

@section('titulo' , 'Lista de Atletas')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@section('content')

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
                        <b>Idade: </b>{{date('Y') - date('Y', strtotime($atleta->data)) }} Anos<br />
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
    {{ $atletas->links('pagination::bootstrap-4') }}
</div>

@endsection