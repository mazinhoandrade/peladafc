@extends('template.admin')

@section('titulo' , 'Painel')

@section('content')


    <div class="container-fluid desk">
        <div class="row justify-content-between ">
            <div class="col-4">
                <h2>Lista dos Babas</h2>
            </div>
            <div class="col-4">
            <h3><a href="baba/create"><b style="color: black;">Add Baba</b></a></h3>
            </div>
        </div>
    </div>
    
    <div class="container-fluid desk corcinza">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#ID</th>
      <th scope="col">Data do Baba</th>
      <th scope="col">Participantes</th>
      <th>Ações</th>
    </tr>
  </thead>

  @foreach ($babas as $baba)
 
  <tbody>
  <tr>
                    <td>{{$baba->id}}</td>
                    <td>{{date('d/m/Y', strtotime($baba->data))}}</td>
                    <td>{{$baba->parti}}</td>   
                    <td>
                        <a href="" class="btn btn-sm"><img src="http://127.0.0.1:8000/storage/media/img/edit.png" width="30px"></a>
                        
                        
                            <form class="d-inline" method="POST" action="{{ route('baba.destroy', $baba->id )}}">
                                @method('DELETE')
                                @csrf
                                <button onclick="return confirm('tem certeza que deseja excluir?')" class="btn btn-sm btn-danger"><img src="http://127.0.0.1:8000/storage/media/img/del.png" width="30px"></button>
                            </form>
                    
                    </td>
                </tr>
  </tbody>

  @endforeach

</table>
    </div>
    <div class="container-fluid desk">
      
    </div>
@endsection