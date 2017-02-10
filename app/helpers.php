<?php



/**
 * [anioactual devuelve el año de trabajo de la aplicació]
 * @param  [Request] $request 
 * @return [string]           [al año actual de trabajo]
 */
function anioActual($request){
	return $request->session()->get('anio', date('m') < 8 ? date('Y')-1 : date('Y'));
}