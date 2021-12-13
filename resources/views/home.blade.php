@extends('template.site')

@section('titulo' , 'Amigos da Bola')
<meta name="csrf-token" content="{{ csrf_token() }}"/>
@section('content')

    <div class="container-fluid desk">
        <h1>Aniversariante(s) do Mes </h1>
        <div class="row justify-content-center align-items-start">
                @forelse ($anis as $ani)
                    <div class="col-6 col-xl-4">
                        <div class="campoAniversario row justify-content-start">
                            <img class="img-responsive" src="{{asset('storage/media/imgat/'.$ani->avatar)}}">
                            <div class="titulo col-12">{{$ani->nome}}</div>
                            <div class="data col-12">{{date('d/m', strtotime($ani->data_aniversario))}}</div>
                        </div>
                    </div>
            @empty
                <b>Nenhum Aniversariante(s) Neste Mes!</b>
            @endforelse

        </div>
    </div>


    <div class="container-fluid desk">
        <h1>Os Melhores da Semana </h1>
        <div class="row justify-content-center align-items-start">
            @if (!empty($tops_semana))

                @for ($i=0; $i<count($tops_semana); $i++)
                    <div class="col-6 col-xl-4">
                        <div class="campoAniversario row justify-content-start">
                            <img class="img-responsive"
                                 src="{{asset("storage/media/imgat/".$tops_semana[$i]['avatar'])}}">
                            <div class="titulo col-12">{{$tops_semana[$i]["nome"]}}</div>
                        </div>
                    </div>
                @endfor

            @else
                <b>Nenhum atleta encotrado!</b>
            @endif


        </div>
    </div>

    <div class="container-fluid desk">
        <div class="row align-items-center">
            <div class="col col-xl-4">
                <h1>Ranking Geral</h1>
            </div>

            <div class="col btn">
                <select name="ranking" id="ranking">
                    <option value="0" selected>Gols</option>
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
                        @if (key($_REQUEST) === 1)
                            assistências
                        @elseif (key($_REQUEST) === 2)
                            falhas
                        @elseif (key($_REQUEST) === 3)
                            capas
                        @else
                            gols
                        @endif
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    @foreach ($tops as $top)
                        <td><img width="60" height="60" src="{{asset('storage/media/imgat/'.$top->avatar)}}"
                                 alt="img-atleta"></td>
                        <td>{{$top->nome}}</td>
                        <td>
                            @if (key($_REQUEST) === 1)
                                {{$top->t_assistecias}}
                            @elseif (key($_REQUEST) === 2)
                                {{$top->t_falhas}}
                            @elseif (key($_REQUEST) === 3)
                                {{$top->t_capas}}
                            @else
                                {{$top->t_gols}}
                            @endif
                        </td>
                </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
        $('#ranking').change(function () {
            let parametro = $(this).find(':selected').val()
            location.href = '?' + parametro;
        });
    </script>
@endsection
