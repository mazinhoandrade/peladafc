<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorebRequest;
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
        $jogos = Baba::Paginate(10);
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
        $atleta = Atleta::all();
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorebRequest $request, Atleta $atleta)
    {
        $dados = $request->except(['_token']);
        $ids = $dados["id"];
        $falhas = $dados["falhas"];
        $gols = $dados["gols"];
        $assis = $dados["assis"];
        $capa = $dados["capa"];
        $baba = new Baba;
        $baba->data = $dados['data'];
        $baba->parti = count($ids);
        for ($i = 0; $i < count($ids); $i++) {
            $atleta = Atleta::find($ids[$i]);
            $atleta->falhas += $falhas[$i];
            $atleta->gols += $gols[$i];
            $atleta->assis += $assis[$i];
            $atleta->capa += $capa[$i];
            $atleta->save();
        }
        $baba->save();
        return redirect()->route('baba.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $baba = Baba::find($id);
        $baba->delete();

        return redirect()->route('baba.index');
    }
}
