<?php

namespace App\Http\Controllers;

use App\Models\Atleta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class HomeController extends Controller
{
   public function aniversariantes($d) {
      $lista = Atleta::where('data','like', '%'.$d.'%')->orderby('nome','ASC')->get();
      return $lista;
  }

   public function lista()
   {
      $data = Atleta::Paginate(5);
      return view('atleta', [
         'atletas' => $data,
         
      ]);
   }

   public function index(Request $request)
   {
      
      
      switch (!empty(key($_REQUEST))) {
         case 0:
            $topGols = Atleta::orderBy('gols', 'DESC')->get();
            break;
         case 1:
            $topGols = Atleta::orderBy('assis', 'DESC')->get();
            break;
         case 2:
            $topGols = Atleta::orderBy('falha', 'DESC')->get();
            break;
         case 3:
            $topGols = Atleta::orderBy('capa', 'DESC')->get();
            break;
      }
      
      $dados = Atleta::all();
      return view('home', [
         'atletas' => $dados,
         'anis' => $this->aniversariantes(date('m')),
         'tops' => $topGols
      ]);
   }
}
