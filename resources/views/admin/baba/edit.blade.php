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


        <div class="row justify-content-between ">
            <div class="col-4">
                <h2>Lista do Baba</h2>
            </div>
        </div>

        <div class="container-fluid corcinza">
            <form id="atleta" action="{{ route('baba.update',$id_baba) }}" method="POST">
                @csrf
                @method('PUT')
                @foreach($dados_baba as $dado_baba)
                    <label>Data do baba:</label></br>
                    <input text="date" name="data" disabled value="{{date('d/m/Y', strtotime($dado_baba->created_at))}}"></br>
                    <label>Descrição:</label></br>
                    <input type="text" name="descricao" value="{{$dado_baba->descricao}}" required></br>
                @endforeach
                @if (!empty($dados))
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">:)</th>
                            <th scope="col">Nome:</th>
                            <th scope="col">Falhas:</th>
                            <th scope="col">Gols:</th>
                            <th scope="col">Assistecias:</th>
                            <th scope="col">Capa:</th>
                        </tr>
                        </thead>



                        <tbody>

                        @for ($i = 0; $i < count($dados) ;$i++)

                            <tr>
                                <td><input type="hidden" name="id[]" value="{{$dados[$i]["id"]}}"></td>
                                <td><input type="text" name="" value="{{ App\Models\Baba::nomeAtleta($dados[$i]["id"])}}" disabled></td>
                                <td><input type="number" min="0" name="falhas[]" value="{{ $dados[$i]["pivot"]["falhas"]}}" required></td>
                                <td><input type="number" min="0" name="gols[]" value="{{ $dados[$i]["pivot"]["gols"]}}" required></td>
                                <td><input type="number" min="0" name="assis[]" id="nun" value="{{ $dados[$i]["pivot"]["assistecias"]}}" required></td>
                                <td>
                                    <select name="capa[]">
                                        @if ($dados[$i]["pivot"]["is_veceu_baba"] === 0)
                                            <option value="0" selected>Não</option>
                                            <option value="1">Sim</option>
                                        @else
                                            <option value="1" selected>Sim</option>
                                            <option value="0">Não</option>
                                        @endif
                                    </select>
{{--                                    value="{{ $dados[$i]["pivot"]["is_veceu_baba"]}}" required>--}}
                                </td>
                            </tr>
                        @endfor
                        </tbody>


                    </table>

                    <hr/>
                    <input id="btn" type="submit" onclick="return validateForm()" value="Editar Baba">
                @endif
            </form>
        </div>

@endsection
