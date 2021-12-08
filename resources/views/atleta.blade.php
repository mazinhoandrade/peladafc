@extends('template.site')

@section('titulo' , 'Lista de Atletas')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@section('content')

    <div class="container-fluid desk">
        <h1>Atletas Amigos da Bola</h1>
        <div class="row justify-content-center align-items-start">

            @foreach($atletas as $atleta)
                <div class="col-6">
                    <div class="areaatletas row justify-content-start">
                        <div class="col-6">
                            <img class="img-responsive" src="{{asset('storage/media/imgat/'.$atleta->avatar)}}">
                        </div>
                        <div class="row col-6">
                            <div class="titulo col-12">{{$atleta->nome}}</div>
                            <div class="infoa col-12">
                                <b>Posição: </b>{{App\Models\Atleta::posicao($atleta->posisao)}}<br />
                                <b>Idade: </b>{{date('Y') - date('Y', strtotime($atleta->data_aniversario)) }} Anos<br />
                                <b>Gols: </b>{{$atleta->t_gols}}<br />
                                <b>Assistecias: </b>{{$atleta->t_assistecias}}<br />
                                <b>Falhas: </b>{{$atleta->t_falhas}}<br />
                                <b>Capas: </b>{{$atleta->t_capas}} vezes<br />
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $atletas->links('pagination::bootstrap-4') }}
    </div>




@endsection
