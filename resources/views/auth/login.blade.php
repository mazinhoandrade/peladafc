@extends('template.site')

@section('titulo' , 'Area de Login')

@section('content')

    
@if(session('warning'))
    <x-alert>
        {{session('warning')}}
    </x-alert>
@endif
    

<div class="campo">
    <form method="POST">
        @csrf
        <label>Usuario:</label>
        <input type="text"  name="name" >
        <label>Senha:</label>
        <input type="password" name="password">
        <input id="btn" type="submit" value="entrar">
    </form>
</div>







@endsection