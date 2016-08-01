<?php

namespace SPAL\Http\Controllers;

use Illuminate\Http\Request;
use SPAL\Http\Requests;
use Carbon\Carbon;
use SPAL\Encuesta;
use SPAL\Des;

class EncuestaController extends Controller
{
    public function index(Request $datos)
    {
        return view('encuesta.encuesta')->with('datos',$datos);
    }

    public function guardar(Request $datos){

        $e = new Encuesta(['plant'=>$datos['plant'],'id_programa'=>$datos['id_programa']]);
        $e->ver = 1;
        $e->feap = Carbon::now();
        $e->id_deleg = Des::where('plant',$datos['plant'])->first()->id_deleg;
        $e->gene1 = $datos['gene1'];
        $e->gene2 = $datos['gene2'];
        $e->gene3 = $datos['gene3'];
        $e->ipa1 = $datos['ipa1'];
        $e->ipa2 = $datos['ipa2'] ;
        $e->en1 = $datos['en1'];
        $e->en2 = $datos['en2'];
        $e->pa1 = $datos['pa1'];
        $e->pa2 = $datos['pa2'];
        $e->pa3 = $datos['pa3'];
        $e->coment = $datos['coment'];

        $e->save();

        return view('salir');

    }

}
