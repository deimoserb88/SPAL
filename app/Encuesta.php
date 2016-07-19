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
}
