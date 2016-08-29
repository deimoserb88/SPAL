select c.id_deleg,c.nomplant,b.nomcarr,count(a.ver) from encuesta a , programa b, des c where a.id_programa = b.id and a.plant = c.plant and a.ver = 1 group by 3 order by c.id_deleg

$r = SPAL\Encuesta::select(DB::raw('des.id_deleg,des.nomplant,programa.nomcarr,count(encuesta.ver) as ver'))->join('programa','encuesta.id_programa','=','programa.id')->join('des','encuesta.plant','=','des.plant')->where('encuesta.ver','=','1')->groupBy('programa.nomcarr')->orderBy('des.id_deleg','asc')->get();
