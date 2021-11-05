@extends('template.admin')

@section('titulo' , 'Painel')

@section('content')


    <div class="container-fluid desk">
        <div class="row justify-content-between ">
            <div class="col-4">
                <h2>Ficha dos Atletas</h2>
            </div>
            
        </div>
    </div>
    
    <div class="container-fluid desk corcinza">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Foto</th>
      <th scope="col">Nome</th>
      <th scope="col">Posição</th>
      <th scope="col">Data De Nacimento</th>
      <th scope="col">Qtd Falhas</th>
      <th scope="col">Qtd Gols</th>
      <th scope="col">Qtd Assistecia</th>
      <th scope="col">Qtd de Capa</th>
      <th>Ações</th>
    </tr>
  </thead>

  @foreach ($atleta as $atlet)

  <tbody>
  <tr>
                    <td><img width="60" height="60" src="{{asset('storage/media/imgat/'.$atlet->avatar)}}" alt="img-atleta"></td>
                    <td>{{$atlet->nome}}</td>
                    <td>{{$atlet->posi}}</td>
                    <td>{{date('d/m/Y', strtotime($atlet->data))}}</td>  
                    <td>{{$atlet->falhas}}</td>
                    <td>{{$atlet->gols}}</td>  
                    <td>{{$atlet->assis}}</td>  
                    <td>{{$atlet->capa}}</td>     
                    <td>
                        <a href="{{ route('atleta.edit', $atlet->id)}}" class="btn btn-sm "><img src="http://127.0.0.1:8000/storage/media/img/edit.png" width="30px"></a>
                        
                        
                            <form class="d-inline" method="POST" action="{{ route('atleta.destroy', $atlet->id )}}">
                                @method('DELETE')
                                @csrf
                                <button onclick="return confirm('tem certeza que deseja excluir?')" class="btn btn-sm"><img src="http://127.0.0.1:8000/storage/media/img/del.png" width="30px"></button>
                            </form>
                    
                    </td>
                </tr>
  </tbody>

  @endforeach

</table>
    </div>
    <div class="container-fluid desk">
      {{ $atleta->links('pagination::bootstrap-4') }}
    </div>
@endsection