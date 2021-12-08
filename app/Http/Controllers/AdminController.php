<?php

namespace App\Http\Controllers;

use App\Models\Atleta;
use App\Models\Baba;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $qtd_atletas = Atleta::count();
        $qtd_babas = Baba::count();

        return view('admin.home', [
            'nome' => $user,
            'qtd_atletas' => $qtd_atletas,
            'qtd_babas' => $qtd_babas
        ]);
    }
}
