<?php

namespace SPAL;

use Illuminate\Database\Eloquent\Model;

class Encuesta extends Model
{
    protected $table = "encuesta";

    protected $fillable = [
        'ver','feap','id_deleg','plant','id_programa',
    	'gene1','gene2','gene3',
        'ipa1','ipa2',
        'en1','en2',
        'pa1','pa2','pa3',
        'coment',
    ];


    public function programa(){
    	return $this->belongsTo('SPAL\Programa','id_programa');
    }

    public function des(){
    	return $this->belongsTo('SPAL\Des','plant');
    }

    public static $items = [1=>
                    'Información contenida en la convocatoria general',
                    'Información contenida en la convocatoria de la carrera a la que aspiraste',
                    'Información que el plantel te proporcionó sobre la(s) carrera(s) que ofrece, antes de inscribirte al proceso de admisión',
                    'Procedimiento para inscribirte al proceso de admisión (llenado de ficha, pago en el banco, etc.)',
                    'Atención del personal administrativo durante el proceso de admisión',
                    'Procedimiento para el llenado de la solicitud electrónica del examen nacional (EXANI II)',
                    'Atención recibida durante la aplicación del examen nacional (EXANI II)',
                    '¿Qué opinas de los criterios y requisitos del proceso de admisión (promedio de bachillerato, examen nacional, documentos solicitados)?',
                    'Si participaste en alguna actividad de información u orientación durante el proceso, ¿a cuál asististe? ¿Qué te pareció?',
                    '¿Qué otras actividades de información u orientación sugieres para el siguiente proceso?',
                    ];

}
