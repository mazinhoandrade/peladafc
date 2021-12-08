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
      <th>Ações</th>
    </tr>
  </thead>

  @foreach ($atletas as $atleta)

  <tbody>
  <tr>
                    <td><img width="60" height="60" src="{{asset('storage/media/imgat/'.$atleta->avatar)}}" alt="img-atleta"></td>
                    <td>{{$atleta->nome}}</td>
                    <td>{{ App\Models\Atleta::posicao($atleta->posisao)}}</td>
                    <td>{{date('d/m/Y', strtotime($atleta->data_aniversario))}}</td>

                    <td>
                        <a href="{{ route('atleta.edit', $atleta->id)}}" class="btn btn-sm "><img src="http://127.0.0.1:8000/storage/media/img/edit.png" width="30px"></a>


                            <form class="d-inline" method="POST" action="{{ route('atleta.destroy', $atleta->id )}}">
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
      {{ $atletas->links('pagination::bootstrap-4') }}
    </div>
@endsection
