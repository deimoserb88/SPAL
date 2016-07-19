<?php

namespace SPAL\Http\Controllers;

use Illuminate\Http\Request;

use SPAL\Http\Requests;

class EncuestaController extends Controller
{
    public function index(Request $datos)
    {
    	return view('encuesta.encuesta')->with('datos',$datos);
    }

    public function guardar(Request $datos){

        


    }
}
