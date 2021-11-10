@extends('template.site')

@section('titulo' , 'Amigos da Bola')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@section('content')

<div class="container-fluid desk">
    <div class="row align-items-center">
        <div class="col-4">
            <h1>Ranking Geral</h1>
        </div>

        <div class="col btn">
            <select name="ranking" id="ranking">
                <option value="">Escolha</option>
                <option value="0">Gols</option>
                <option value="1">assistência</option>
                <option value="2">Falhas</option>
                <option value="3">Capas</option>
            </select>
        </div>
    </div>
    <div class="row justify-content-center align-items-start">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Foto</th>
                    <th scope="col">Nome</th>
                    <th scope="col">
                        @if(key($_REQUEST) === 0)
                        gols
                        @elseif (key($_REQUEST) === 1)
                        assistência
                        @elseif (key($_REQUEST) === 2)
                        falhas  
                        @elseif (key($_REQUEST) === 3)
                        capa   
                        @else
                        gols                            
                        @endif
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach ($tops as $top)
                    <td><img width="60" height="60" src="{{asset('storage/media/imgat/'.$top->avatar)}}" alt="img-atleta"></td>
                    <td>{{$top->nome}}</td>
                    <td>@if(key($_REQUEST) === 0)
                        {{$top->gols}}
                        @elseif (key($_REQUEST) === 1)
                        {{$top->assis}}
                        @elseif (key($_REQUEST) === 2)
                        {{$top->falhas}}  
                        @elseif (key($_REQUEST) === 3)
                        {{$top->capa}}
                        @else
                        {{$top->gols}}
                        @endif
                    </td>

                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
</div>



<div class="container-fluid desk">
    <h1>Aniversariante(s) do Mes </h1>
    <div class="row justify-content-center align-items-start">

        @foreach ($atletas as $atleta)
        @if ( date('m', strtotime($atleta->data)) === date('09') )

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
    <!-- {{ $atletas->links('pagination::bootstrap-4') }} -->
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
    $('#ranking').change(function() {
        var parametro = $(this).find(':selected').val()
        location.href = '?' + parametro;
    });
</script>
@endsection