@extends('template.site')

@section('titulo' , 'Area de Login')

@section('content')

    <style>
        .bl {
            display: none;
        }
    </style>

@if(session('warning'))
    <x-alert>
        {{session('warning')}}
    </x-alert>
@endif


<div class="campo input-group">
    <form  method="POST">
        @csrf
        <label>Usuario:</label>
        <input class="form-control" type="text"  name="name" >
        <label>Senha:</label>
        <input class="form-control" type="password" name="password">
        <input class="form-control" id="btn" type="submit" value="entrar">
    </form>
</div>







@endsection
