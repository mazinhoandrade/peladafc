@extends('template.admin')

@section('titulo' , 'Painel')

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
            <h2>Cadastra Atleta</h2>
        </div>
    </div>

    <div class="container-fluid corcinza">
        <form id="atleta" action="{{ route('atleta.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label>Nome Do Atleta:</label></br>
            <input type="text" name="nome"></br>
            <label>Posição do Atleta:</label></br>
            <select  name="posi">
                <option value="Goleiro Linha">Goleiro Linha</option>
                <option value="Fixo" selected>Fixo</option>
                <option value="Ala">Ala</option>
                <option value="Pivô">Pivô</option>
            </select>
            <label>Data de Nacimento:</label></br>
            <input type="date" name="data"></br>
            <label>Foto Do Atleta (jpg,png):</label></br>
            <input type="file" name="avatar">
            <hr />
            <input id="btn" type="submit" value="Adicionar atleta">
        </form>
    </div>

    @endsection