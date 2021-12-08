<?php

namespace App\Http\Controllers;

use App\Models\Atleta;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class MapController extends Controller
{
    public function index()
    {
        /**
         * @var Atleta $x
         */
        $x = Atleta::whereIn('capa',[7,6,5])->get();

        //dd($x);
        return view('map');
    }
}
