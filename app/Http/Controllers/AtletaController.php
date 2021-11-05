<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\Http\Requests\UpdateAtletaRequest;
use App\Http\Requests\StoreRequest;
use App\Models\Atleta;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\This;

class AtletaController extends Controller
{
  


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

 

    public function __construct() {
        $this->middleware('auth');
    }

    


    public function index(Request $request, Atleta $atleta)
    {

        if (!empty($s)) {
            $atleta = Atleta::where('id', $s)->orwhere('nome','like', '%' .$s. '%')->get();
            
            return view('admin.atletas.index', [
            'atleta' =>$atleta
            ]);
            
        } else {

            $atleta = Atleta::Paginate(10);
            return view('admin.atletas.index', [
                'atleta' =>$atleta
            ]);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.atletas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, Atleta $atleta)
    {
        if(!empty($request->avatar))
        {
            $request->avatar->store(Atleta::PATH_FILE, 'public');
            $request->request->add([
                'avatar' => $request->avatar->hashName(),
            ]);

        }

        $atleta->create($request->request->all());
        return redirect()->route('atleta.index');
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
        $dados = Atleta::find($id);
        return view('admin.atletas.edit', ['atleta'=>$dados]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAtletaRequest $request, Atleta $jogador, $id)
    {
        $jogador = Atleta::find($id);
        if(!empty($request->avatar))
        {
        $request->avatar->store(Atleta::PATH_FILE, 'public');
           
            $imgName = strval( $jogador->avatar );
            if ($imgName !== 'default.png') {
                Storage::delete([
                    "public/".Atleta::PATH_FILE."/".$jogador->avatar
                ]);
            }

            $request->request->add([
                'avatar' => $request->avatar->hashName(),
            ]);

        } 
      
        $jogador->update($request->request->all());
        return redirect()->route('atleta.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $atleta = Atleta::find($id);
        $atleta->delete();

        return redirect()->route('atleta.index');
    }
}
