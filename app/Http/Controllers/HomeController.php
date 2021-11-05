<?php

namespace App\Http\Controllers;

use App\Models\Atleta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class HomeController extends Controller
{
   protected $aniversariantes = [];


   public function index()
   {

      $dados = Atleta::Paginate(10);
      
      return view('home', ['atletas' => $dados]);
   }
}
