@extends('template.admin')

@section('titulo' , 'Painel')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@section('content')

@if ($errors->any())
<div class="container-fluid desk alert alert-danger">
    <h4><i class="icon fa fa-ban"></i> Ocorreu Erro(s)</h4>
    <ul>
        @foreach ($errors->all() as $erro)
        <li>{{$erro}}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="container-fluid desk">


    <div class="container-fluid corcinza">
        <form action="{{ route('baba.storeli') }}" method="POST">
            <div class="row justify-content-between">

                @csrf
                @foreach ($atletas as $atleta)
                    <div class="col-6 col-xl-3">
                        <input type="checkbox" name="{{$atleta->id}}" value="{{$atleta->nome}}"/> {{$atleta->nome}}<br/>
                    </div>
                @endforeach

            </div>
            <input id="btn" type="submit" value="add atletas na lista">

        </form>
    </div>

    <div class="row justify-content-between ">
        <div class="col col-xl-3">
            <h2>Lista do Baba</h2>
        </div>
    </div>

    <div class="container-fluid corcinza">
        <form id="baba" action="{{ route('baba.store') }}" method="POST">
            @csrf
            <label>Data do baba:</label></br>
            <input type="date" name="data"></br>
            <label>Descrição:</label></br>
            <input class="mb-2" type="text" name="descricao" required></br>
            @if (!empty($listas))
            <table class="table-striped">
                <thead class="mb-1">
                    <tr>
                        <th scope="col "></th>
                        <th scope="col">Nome:</th>
                        <th scope="col mr-1">Falhas:</th>
                        <th scope="col">Gols:</th>
                        <th scope="col">Assistecias:</th>
                        <th scope="col">Capa:</th>
                    </tr>
                </thead >

                <tbody>

                    @foreach ($listas as $key => $lista)

                    <tr style="margin-bottom: 5px">
                        <td><input type="hidden" name="id[]" value="{{$key}}"></td>
                        <td><input class="td-input" type="text" name="{{$lista}}" value="{{$lista}}" disabled></td>
                        <td><input class="" type="number" min="0" name="falhas[]" value="0" required></td>
                        <td><input class="" type="number" min="0" name="gols[]"   value="0" required></td>
                        <td><input class="" type="number" min="0" name="assis[]" id="nun"  value="0" required></td>
                        <td>
                            <select name="capa[]">
                                    <option value="0" selected>Não</option>
                                    <option value="1">Sim</option>
                            </select>
{{--                            <input class="" type="number" min="0" name="capa[]" id="nun"  value="0" required>--}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>



            </table>

            <hr />
            <input id="btn" type="submit" onclick="return validateForm()" value="Cadastrar Baba">
            @endif
        </form>
    </div>

    @endsection
