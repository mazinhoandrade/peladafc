<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorebRequest;
use App\Models\AtletaBaba;
use Illuminate\Http\Request;
use App\Models\Baba;
use App\Models\Atleta;


class BabaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $jogos = Baba::orderBy('created_at', 'desc')->Paginate(10);
        return view('admin.baba.index', [
            'babas' => $jogos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $atleta = Atleta::orderBy('nome', 'asc')->get()->all();
        return view('admin.baba.create', [
            'atletas' => $atleta
        ]);
    }

    public function storeli(Request $request)
    {
        $dados = $request->except(['_token']);
        $atleta = Atleta::all();

        return view('admin.baba.create', [
            'listas' => $dados,
            'atletas' => $atleta
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorebRequest $request, Atleta $atleta)
    {
        date_default_timezone_set('America/Sao_Paulo');
        $dados = $request->except(['_token']);
        if (!empty($dados["data"])) {
            $dataAtual = $dados["data"];
        } else {
            $dataAtual = date("Y-m-d H:i:s");
        }
        $ids = $dados["id"];
        $falhas = $dados["falhas"];
        $gols = $dados["gols"];
        $assis = $dados["assis"];
        $capa = $dados["capa"];
        $baba = new Baba;
        $baba->created_at = $dataAtual;
        $baba->descricao = $dados['descricao'];
        $baba->save();
        for ($i = 0; $i < count($ids); $i++) {
            $baba = Baba::find($baba->id);
            Atleta::find($ids[$i])
                ->babas()
                ->attach($baba->id,
                    [
                        'falhas' => $falhas[$i],
                        'gols' => $gols[$i],
                        'assistecias' => $assis[$i],
                        'is_veceu_baba' => $capa[$i],
                        'created_at' => $dataAtual,
                    ]);
        }

        return redirect()->route('baba.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */


    public function edit($id)
    {
        $dados = Baba::with('filtroBabas')
            ->where('id', '=', $id)
            ->get();
        $data = $dados[0]["filtroBabas"];

        return view('admin.baba.edit', [
            'dados' => $data,
            'id_baba' => $id,
            'dados_baba' => $dados
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorebRequest $request, $id)
    {
        date_default_timezone_set('America/Sao_Paulo');
        $dados = $request->except(['_token']);
        if (!empty($dados["data"])) {
            $dataAtual = $dados["data"];
        } else {
            $dataAtual = date("Y-m-d H:i:s");
        }
        $ids = $dados["id"];
        $falhas = $dados["falhas"];
        $gols = $dados["gols"];
        $assis = $dados["assis"];
        $capa = $dados["capa"];
        $baba = Baba::find($id);
        $baba->update([
            'updated_at'=>$dataAtual,
            'descricao'=>$dados["descricao"],
        ]);

        for ($i = 0; $i < count($ids); $i++) {
            $baba = Baba::find($id);
            Atleta::find($ids[$i])
                ->babas()
                ->updateExistingPivot($id,
                    [
                        'falhas' => $falhas[$i],
                        'gols' => $gols[$i],
                        'assistecias' => $assis[$i],
                        'is_veceu_baba' => $capa[$i],
                        'updated_at' => $dataAtual,
                    ]);
        }

        return redirect()->route('baba.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $baba = Baba::find($id);
        $baba->atletas()->detach();
        $baba->forceDelete();
        return redirect()->route('baba.index');
    }
}
