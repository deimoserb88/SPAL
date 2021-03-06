<?php

namespace SPAL\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use SPAL\Http\Requests;
use SPAL\Encuesta;
use SPAL\Inscrito;
use SPAL\Des;
use SPAL\Programa;
use SPAL\Deleg;
use DB;


class AdminController extends Controller
{
    public function index(Request $request){
        // $anio = $request->session()->get('anio', date('m') < 8 ? date('Y')-1 : date('Y'));
        $anio = anioActual($request);

        $e = Encuesta::where('feap','like',$anio."%")->count();

        $i = Inscrito::where('anio',$anio)->sum('insc');

        $anios = Encuesta::select(DB::raw('distinct year(feap) as anio'))->get();

        return view('admin.admin_home',compact('e','i','anio','anios'));
    }

    public function avance(Request $request){
        $anio = anioActual($request);

        $e = Encuesta::select(DB::raw('encuesta.id_programa,des.id_deleg,des.nomplant,programa.nomcarr,programa.id,count(encuesta.ver) as ver'))
                        ->join('programa','encuesta.id_programa','=','programa.id')
                        ->join('des','encuesta.plant','=','des.plant')
                        ->where('encuesta.ver','=','1')
                        ->where(DB::raw("year('encusta.feap') = ".$anio))
                        ->groupBy('encuesta.id_programa')
                        ->orderBy('des.id_deleg','asc')
                        ->orderBy('des.nomplant','asc')
                        ->get();

        $insc = Inscrito::select('id_programa','insc')->where('anio','=',$anio)->get()->toArray();
        $i = [];
        foreach ($insc as $v) {
            $i[$v['id_programa']] = $v['insc']; 
        }

        $anios = Encuesta::select(DB::raw('distinct year(feap) as anio'))->get();
        
        return view('admin.avance',compact('e','i','anio','anios'));

    }

    public function resultados(Request $request,$plant = '%%',$id_programa = '%%'){
        $anio = anioActual($request);
        $anios = Encuesta::select(DB::raw('distinct year(feap) as anio'))->get();
        $planteles = Des::all()->sortBy('nomplant');
        $programas = Programa::all()->sortBy('nomcarr');

        //total encustas aplicadas
        $tea = Encuesta::where('feap','>',$anio.'-01-08')                            
                            ->where('ver','=',1)
                            ->where('plant','like',$plant)
                            ->where('id_programa','like',$id_programa)
                            ->count('ver');
        
        if($plant != '%%'){
            $deleg = Deleg::select('deleg.delegacion')
                            ->join('des','deleg.id','=','des.id_deleg')
                            ->where('des.plant','=',$plant)
                            ->get()->toArray();
        }else{
            $deleg[0]['delegacion'] = 'Todas las delegaciones';
        }      

        $g1 = Encuesta::select(DB::raw('gene1, count(gene1) as tt'))
                            ->where('plant','like',$plant)
                            ->where('id_programa','like',$id_programa)
                            ->where(DB::raw("year('feap') = ".$anio))
                            ->groupBy('gene1')
                            ->get()->toArray();
        $gene1 = [1=>0,0,0,0,0,0];
        foreach(range(0,5) as $i){
            if(isset($g1[$i])){
                $gene1[$g1[$i]['gene1']] = $g1[$i]['tt'];
            }
            
        }

        $g2 = Encuesta::select(DB::raw('gene2, count(gene2) as tt'))
                            ->where('plant','like',$plant)
                            ->where('id_programa','like',$id_programa)
                            ->where(DB::raw("year('feap') = ".$anio))
                            ->groupBy('gene2')
                            ->get()->toArray();
        $gene2 = [1=>0,0,0,0,0,0];
        foreach(range(0,5) as $i){
            if(isset($g2[$i])){
                $gene2[$g2[$i]['gene2']] = $g2[$i]['tt'];
            }
            
        }

        $g3 = Encuesta::select(DB::raw('gene3, count(gene3) as tt'))
                            ->where('plant','like',$plant)
                            ->where('id_programa','like',$id_programa)
                            ->where(DB::raw("year('feap') = ".$anio))
                            ->groupBy('gene3')
                            ->get()->toArray();
        $gene3 = [1=>0,0,0,0,0,0];
        foreach(range(0,5) as $i){
            if(isset($g3[$i])){
                $gene3[$g3[$i]['gene3']] = $g3[$i]['tt'];
            }
            
        }

        // ipa1 no se emplea en el 2106
        $p2 = Encuesta::select(DB::raw('ipa2, count(ipa2) as tt'))
                            ->where('plant','like',$plant)
                            ->where('id_programa','like',$id_programa)
                            ->where(DB::raw("year('feap') = ".$anio))
                            ->groupBy('ipa2')
                            ->get()->toArray();
        $ipa2 = [1=>0,0,0,0,0,0];
        foreach(range(0,5) as $i){
            if(isset($p2[$i])){
                $ipa2[$p2[$i]['ipa2']] = $p2[$i]['tt'];
            }
            
        }
        // ipa3 no se emplea en el 2106
        $p4 = Encuesta::select(DB::raw('ipa4, count(ipa4) as tt'))
                            ->where('plant','like',$plant)
                            ->where('id_programa','like',$id_programa)
                            ->where(DB::raw("year('feap') = ".$anio))
                            ->groupBy('ipa4')
                            ->get()->toArray();
        $ipa4 = [1=>0,0,0,0,0,0];
        foreach(range(0,5) as $i){
            if(isset($p4[$i])){
                $ipa4[$p4[$i]['ipa4']] = $p4[$i]['tt'];
            }
            
        }

        $e1 = Encuesta::select(DB::raw('en1, count(en1) as tt'))
                            ->where('plant','like',$plant)
                            ->where('id_programa','like',$id_programa)
                            ->where(DB::raw("year('feap') = ".$anio))
                            ->groupBy('en1')
                            ->get()->toArray();
        $en1 = [1=>0,0,0,0,0,0];
        foreach(range(0,5) as $i){
            if(isset($e1[$i])){
                $en1[$e1[$i]['en1']] = $e1[$i]['tt'];
            }
            
        }

        $e2 = Encuesta::select(DB::raw('en2, count(en2) as tt'))
                            ->where('plant','like',$plant)
                            ->where('id_programa','like',$id_programa)
                            ->where(DB::raw("year('feap') = ".$anio))
                            ->groupBy('en2')
                            ->get()->toArray();
        $en2 = [1=>0,0,0,0,0,0];
        foreach(range(0,5) as $i){
            if(isset($e2[$i])){
                $en2[$e2[$i]['en2']] = $e2[$i]['tt'];
            }
            
        }

        $pa1 = Encuesta::select('pa1')
                            ->where('plant','like',$plant)
                            ->where('id_programa','like',$id_programa)
                            ->where(DB::raw("year('feap') = ".$anio))
                            ->get();

        $pa2 = Encuesta::select('pa2')
                            ->where('plant','like',$plant)
                            ->where('id_programa','like',$id_programa)
                            ->where(DB::raw("year('feap') = ".$anio))
                            ->get();

        $pa3 = Encuesta::select('pa3')
                            ->where('plant','like',$plant)
                            ->where('id_programa','like',$id_programa)
                            ->where(DB::raw("year('feap') = ".$anio))
                            ->get();

        return view('admin.resultados',compact('anio','anios','planteles','programas','tea','deleg','plant','id_programa','gene1','gene2','gene3','ipa2','ipa4','en1','en2','pa1','pa2','pa3'));

    }

    public function resultadosgenerales(Request $request){
        $anio = anioActual($request);
        
        $sal = mysqli_connect('localhost','root','') or die("Imposible conectarse a la base de datos: ".mysqli_error($sal));
        // $sal = mysqli_connect('localhost','dges_espal','Er98aqcMJRjZVZvP') or die("Imposible conectarse a la base de datos: ".mysqli_error($sal));
        @mysqli_select_db($sal,'dges_espal') or die("Imposible seleccionar la base de datos: ".mysqli_error($sal));
        mysqli_set_charset($sal, "utf8");
        return view('admin.resultados_generales',compact('anio','sal'));
    }

    public function resultadosgeneralesdeleg(Request $request){
        $anio = anioActual($request);
        
        $sal = mysqli_connect('localhost','root','') or die("Imposible conectarse a la base de datos: ".mysqli_error($sal));
        // $sal = mysqli_connect('localhost','dges_espal','Er98aqcMJRjZVZvP') or die("Imposible conectarse a la base de datos: ".mysqli_error($sal));
        @mysqli_select_db($sal,'dges_espal') or die("Imposible seleccionar la base de datos: ".mysqli_error($sal));
        mysqli_set_charset($sal, "utf8");
        return view('admin.resultados_generales_deleg',compact('anio','sal'));
    }

    public function inscritosCaptura(Request $request){
        $anio = anioActual($request);

        $p = Des::with('programa')->orderBy('id_deleg')->get();

        $insc = Inscrito::select('id_programa','insc')->where('anio','=',$anio)->get()->toArray();
        $i = [];
        foreach ($insc as $v) {
            $i[$v['id_programa']] = $v['insc']; 
        }
        $anios = Encuesta::select(DB::raw('distinct year(feap) as anio'))->get();
        
        return view('admin.inscritos_captura',compact('p','i','anio','anios'));
    }

    public function inscritosGuardar(Request $request){
        $anio = anioActual($request);

        $datos = $request->toArray();        
        
        foreach($datos as $id_programa=>$inscritos){
            if($id_programa != '_token'){
                $ins = Inscrito::firstOrNew(['id_programa'=>$id_programa,'anio'=>$anio]);
                $ins->id_programa = $id_programa;
                $ins->insc = $inscritos;
                $ins->anio = $anio;
                $ins->save();

            }
        }

        return redirect()->action('AdminController@inscritosCaptura');
        
    }

    public function anioCambiar(Request $request,$anio){
        $request->session()->put('anio',$anio);
        return redirect()->action('AdminController@index');
    }

}
