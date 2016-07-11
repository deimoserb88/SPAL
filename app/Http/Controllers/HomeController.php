<?php

namespace SPAL\Http\Controllers;

use SPAL\Http\Requests;
use Illuminate\Http\Request;
use SPAL\Des;
use SPAL\Programa;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($plant="")
    {
        $planteles = Des::all()->sortBy('nomplant');
        
        if($plant!=""){            
            $programas = Programa::where('plant',$plant)->get();                      
            return view('welcome')->with(['planteles'=>$planteles,'plant'=>$plant,'programas'=>$programas]);
        }else{
            return view('welcome')->with('planteles',$planteles);
        }
    }
}
