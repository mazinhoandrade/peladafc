@extends('template.site')

@section('titulo' , 'Area de Login')

@section('content')


    @if($errors->any())
        <x-alert>
            <ul>
            @foreach( $errors->all() as $error )
            <li>{{$error}}</li>
            @endforeach
            </ul>
        </x-alert>
    @endif


<div class="campo">
    <form method="POST">
        @csrf
        <label>Usuario:</label>
        <input type="text"  name="name" >
        <label>Email:</label>
        <input type="email" name="email">
        <label>Senha:</label>
        <input type="password" name="password">
        <input type="password" name="password_confirmation">
        <input id="btn" type="submit" value="cadastrar">
    </form>
</div>







@endsection
