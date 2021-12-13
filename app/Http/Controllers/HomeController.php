<?php

namespace App\Http\Controllers;

use App\Models\Atleta;
use App\Models\Baba;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Gate;

class HomeController extends Controller
{
    /**
     * Método pra retornar a lista de aniversariante
     * @param int $mes
     * @return Collection
     */
    public function aniversariantes(int $mes): Collection
    {
        return Atleta::whereRaw('MONTH(data_aniversario)=?', $mes)->orderby('nome', 'ASC')->get();
    }

    /**
     * Método para pegar uma lista de atletas e dados de uma tabela relacionada "atleta_baba"
     * @return view /atleta
     * @var array $atletas
     */
    public function lista()
    {

        $atletas = Atleta::withSum('atletasBabas as t_gols', 'gols')
            ->withSum('atletasBabas as t_assistecias', 'assistecias')
            ->withSum('atletasBabas as t_falhas', 'falhas')
            ->withSum('atletasBabas as t_capas', 'is_veceu_baba')
            ->orderBy('nome', 'asc')
            ->Paginate(10);


        return view('atleta', [
            'atletas' => $atletas,

        ]);
    }

    public function index(Request $request)
    {
        $tops_semana = Baba::with('filtroMelhores')
            ->where('created_at', '>', date("Y-m-d H:i:s", strtotime('-4 days')))
            ->limit(5)
            ->first();

        if (key($_REQUEST) === 1) {
            $dados = Atleta::withSum('atletasBabas as t_assistecias', 'assistecias')
                ->orderBy('t_assistecias', 'desc')
                ->get();
        } elseif (key($_REQUEST) === 2) {
            $dados = Atleta::withSum('atletasBabas as t_falhas', 'falhas')
                ->orderBy('t_falhas', 'desc')
                ->get();
        } elseif (key($_REQUEST) === 3) {
            $dados = Atleta::withSum('atletasBabas as t_capas', 'is_veceu_baba')
                ->orderBy('t_capas', 'desc')
                ->get();
        } else {
            $dados = Atleta::withSum('atletasBabas as t_gols', 'gols')
                ->orderBy('t_gols', 'desc')
                ->get();
        }

        return view('home', [
            'anis' => $this->aniversariantes(date('m')),
            'tops' => $dados,
            'tops_semana' => $tops_semana !== null ? $tops_semana["filtroMelhores"] : null
        ]);
    }
}
